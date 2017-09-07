<?php namespace Anomaly\FormsModule\Form;

use Anomaly\FilesModule\File\Contract\FileInterface;
use Anomaly\FormsModule\Form\Contract\FormInterface;
use Anomaly\FormsModule\Form\Contract\FormRepositoryInterface;
use Anomaly\FormsModule\Notification\Contract\NotificationInterface;
use Anomaly\Streams\Platform\Assignment\Contract\AssignmentInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Support\Value;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\WysiwygFieldType\WysiwygFieldType;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;

/**
 * Class FormMailer
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule\Form
 */
class FormMailer
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
     * Create a new FormMailer instance.
     *
     * @param Mailer                  $mailer
     * @param Value                   $value
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
     * @param FormBuilder   $builder
     */
    public function send(FormInterface $form, FormBuilder $builder)
    {
        $input = $builder->getFormEntry();

        if (!$form->shouldSendNotification()) {
            return;
        }

        if (!$form->getNotificationSendTo()) {
            return;
        }

        /* @var NotificationInterface $notification */
        $notification = $form->getNotification();

        /* @var WysiwygFieldType $email */
        $email  = $notification->getFieldType('notification_content');
        $layout = $notification->getFieldValue('notification_email_layout');

        $content = $email->getViewPath();

        $this->mailer->send(
            $layout ?: 'anomaly.module.forms::email',
            compact('input', 'form', 'content'),
            function (Message $message) use ($form, $input, $builder, $notification) {

                $message->cc($form->getNotificationCc());
                $message->bcc($form->getNotificationBcc());
                $message->to($form->getNotificationSendTo());
                $message->subject($this->value->make($notification->getNotificationSubject(), $input, 'input'));
                $message->sender($this->value->make($notification->getNotificationFromEmail(), $input, 'input'));
                $message->replyTo(
                    $this->value->make($notification->getNotificationReplyToEmail(), $input, 'input'),
                    $this->value->make($notification->getNotificationReplyToName(), $input, 'input')
                );
                $message->from(
                    $this->value->make($notification->getNotificationFromEmail(), $input, 'input'),
                    $this->value->make($notification->getNotificationFromName(), $input, 'input')
                );

                $this->attachFiles($message, $input);
            }
        );
    }

    /**
     * Attach file uploads.
     *
     * @param Message        $message
     * @param EntryInterface $entry
     */
    protected function attachFiles(Message $message, EntryInterface $entry)
    {
        /* @var AssignmentInterface $assignment */
        foreach ($entry->getAssignmentsByFieldType('anomaly.field_type.file') as $assignment) {
            /* @var FileInterface $file */
            if ($file = $entry->{$assignment->getFieldSlug()}) {
                $message->attachData($file->resource()->read(), $file->getName());
            }
        }
    }
}
