<?php namespace Anomaly\FormsModule\Form;

use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\FormsModule\Form\Contract\FormInterface;
use Anomaly\FormsModule\Form\Contract\FormRepositoryInterface;
use Anomaly\Streams\Platform\Assignment\Contract\AssignmentInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Support\Value;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\WysiwygFieldType\WysiwygFieldType;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;

/**
 * Class FormAutoresponder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule\Form
 */
class FormAutoresponder
{

    /**
     * The form repository.
     *
     * @var FormRepositoryInterface
     */
    protected $forms;

    /**
     * The value utility.
     *
     * @var Value
     */
    protected $value;

    /**
     * The mailer utility.
     *
     * @var Mailer
     */
    protected $mailer;

    /**
     * Create a new FormAutoresponder instance.
     *
     * @param Mailer $mailer
     * @param Value $value
     * @param FormRepositoryInterface $forms
     */
    public function __construct(Mailer $mailer, Value $value, FormRepositoryInterface $forms)
    {
        $this->mailer = $mailer;
        $this->value  = $value;
        $this->forms  = $forms;
    }

    /**
     * Send the form message.
     *
     * @param FormInterface $form
     * @param FormRepositoryInterface $forms
     * @param FormBuilder $builder
     */
    public function send(FormInterface $form, FormBuilder $builder)
    {
        $input = $entry = $builder->getFormEntry();

        $stream = $entry->getStream();
        $form   = $this->forms->findBySlug($stream->getSlug());

        if (!$form->shouldSendAutoresponder()) {
            return;
        }

        $notification = $form->getAutoresponder();

        /* @var WysiwygFieldType $email */
        $email = $notification->getFieldType('notification_content');

        $this->mailer->send(
            $email->getViewPath(),
            compact('input'),
            function (Message $message) use ($form, $entry, $builder, $notification) {

                $field = $form->getUserEmailField();

                $message->to($entry->{$field->getSlug()});
                $message->subject($this->value->make($notification->getNotificationSubject(), $entry, 'input'));
                $message->sender($this->value->make($notification->getNotificationFromEmail(), $entry, 'input'));
                $message->replyTo(
                    $this->value->make($notification->getNotificationReplyToEmail(), $entry, 'input'),
                    $this->value->make($notification->getNotificationReplyToName(), $entry, 'input')
                );
                $message->from(
                    $this->value->make($notification->getNotificationFromEmail(), $entry, 'input'),
                    $this->value->make($notification->getNotificationFromName(), $entry, 'input')
                );

                $this->attachFiles($message, $entry, $builder);
            }
        );
    }

    /**
     * Attach file uploads.
     *
     * @param Message $message
     * @param EntryInterface $entry
     * @param FormBuilder $builder
     */
    protected function attachFiles(Message $message, EntryInterface $entry, FormBuilder $builder)
    {

        /**
         * Fire a callback allowing the form builder
         * to manage it's attachments dynamically.
         */
        $builder->fire('attaching_files', compact('message', 'entry', 'builder'));

        /* @var AssignmentInterface $assignment */
        foreach ($entry->getAssignmentsByFieldType('anomaly.field_type.file') as $assignment) {

            /* @var FileInterface $file */
            if ($file = $entry->{$assignment->getFieldSlug()}) {
                $message->attachData($file->resource()->read(), $file->getName());
            }
        }
    }
}
