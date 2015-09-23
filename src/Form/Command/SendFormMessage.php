<?php namespace Anomaly\FormsModule\Form\Command;

use Anomaly\FormsModule\Form\Contract\FormInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\WysiwygFieldType\WysiwygFieldType;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;

/**
 * Class SendFormMessage
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule\Form\Command
 */
class SendFormMessage implements SelfHandling
{

    /**
     * The form builder.
     *
     * @var FormBuilder
     */
    protected $builder;

    /**
     * Create a new SendFormMessage instnce.
     *
     * @param FormBuilder $builder
     */
    public function __construct(FormBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function handle(Mailer $mailer)
    {
        /* @var FormInterface $config */
        $config = $this->builder->getOption('config');

        /* @var WysiwygFieldType $email */
        $email = $config->getFieldTypePresenter('message_content');

        $mailer->send(
            $email->getViewPath(),
            [],
            function (Message $message) use ($config) {

                $message->from($config->getMessageFromEmail(), $config->getMessageFromName());
                $message->subject($config->getMessageSubject());
                $message->to($config->getMessageSendTo());
            }
        );
    }
}
