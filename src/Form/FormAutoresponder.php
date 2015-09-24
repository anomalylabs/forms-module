<?php namespace Anomaly\FormsModule\Form;

use Anomaly\FormsModule\Form\Contract\FormInterface;
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
     * @param Value  $value
     */
    public function __construct(Mailer $mailer, Value $value)
    {
        $this->value  = $value;
        $this->mailer = $mailer;
    }

    /**
     * Send the form autoresponder.
     *
     * @param FormInterface $form
     * @param FormBuilder   $builder
     */
    public function send(FormInterface $form, FormBuilder $builder)
    {
        if (!$form->hasAutoresponder()) {
            return;
        }

        $input = $entry = $builder->getFormEntry();

        /* @var WysiwygFieldType $email */
        $email = $form->getFieldType('autoresponder_content');

        $this->mailer->send(
            $email->getViewPath(),
            compact('input'),
            function (Message $message) use ($form, $entry, $builder) {

                $message->cc($form->getAutoresponderCc());
                $message->bcc($form->getAutoresponderBcc());
                $message->to($this->value->make($form->getAutoresponderSendTo(), $entry, 'input'));
                $message->subject($this->value->make($form->getAutoresponderSubject(), $entry, 'input'));
                $message->replyTo(
                    $this->value->make($form->getAutoresponderReplyToEmail(), $entry, 'input'),
                    $this->value->make($form->getAutoresponderReplyToName(), $entry, 'input')
                );
                $message->from(
                    $this->value->make($form->getAutoresponderFromEmail(), $entry, 'input'),
                    $this->value->make($form->getAutoresponderFromName(), $entry, 'input')
                );
            }
        );
    }
}
