<?php namespace Anomaly\FormsModule\Form\Command;

use Anomaly\FormsModule\Form\Contract\FormInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
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

        $mailer->send(
            $config->getFieldTypePresenter('message_content')->path(),
            [],
            function (Message $message) use ($config) {

                $message->from($config->getFromEmail(), $config->getFromName());
                $message->to($config->getSendTo());
                $message->subject($config->getSubject());
            }
        );
    }
}
