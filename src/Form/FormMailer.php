<?php namespace Anomaly\FormsModule\Form;

use Anomaly\FormsModule\Form\Contract\FormInterface;
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
     * @param Mailer $mailer
     * @param Value  $value
     */
    public function __construct(Mailer $mailer, Value $value)
    {
        $this->value  = $value;
        $this->mailer = $mailer;
    }

    /**
     * Send the form message.
     *
     * @param FormInterface $form
     * @param FormBuilder   $builder
     */
    public function send(FormInterface $form, FormBuilder $builder)
    {
        $entry = $builder->getFormEntry();

        /* @var WysiwygFieldType $email */
        $email = $form->getFieldType('message_content');

        $this->mailer->send(
            $email->getViewPath(),
            [],
            function (Message $message) use ($form, $entry, $builder) {

                $message->cc($form->getMessageCc());
                $message->bcc($form->getMessageBcc());
                $message->to($form->getMessageSendTo());
                $message->subject($this->value->make($form->getMessageSubject(), $entry, 'input'));
                $message->replyTo(
                    $this->value->make($form->getMessageReplyToEmail(), $entry, 'input'),
                    $this->value->make($form->getMessageReplyToName(), $entry, 'input')
                );
                $message->from(
                    $this->value->make($form->getMessageFromEmail(), $entry, 'input'),
                    $this->value->make($form->getMessageFromName(), $entry, 'input')
                );
            }
        );
    }
}
