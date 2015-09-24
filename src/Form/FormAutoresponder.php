<?php namespace Anomaly\FormsModule\Form;

use Anomaly\FormsModule\Form\Contract\FormInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Contracts\Mail\Mailer;

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
     * The mailer utility.
     *
     * @var Mailer
     */
    protected $mailer;

    /**
     * Create a new FormAutoresponder instance.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
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
    }
}
