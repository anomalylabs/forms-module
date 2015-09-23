<?php namespace Anomaly\FormsModule\Form;

use Anomaly\FormsModule\Form\Contract\FormInterface;
use Anomaly\Streams\Platform\Model\Forms\FormsFormsEntryModel;

/**
 * Class FormModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule\Form
 */
class FormModel extends FormsFormsEntryModel implements FormInterface
{

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        self::observe(app(substr(__CLASS__, 0, -5) . 'Observer'));

        parent::boot();
    }

    /**
     * Get the form slug.
     *
     * @return string
     */
    public function getFormSlug()
    {
        return $this->form_slug;
    }

    /**
     * Get the message send to emails.
     *
     * @return array
     */
    public function getMessageSendTo()
    {
        return $this->message_send_to;
    }

    /**
     * Get the message from email.
     *
     * @return string
     */
    public function getMessageFromEmail()
    {
        return $this->message_from_email;
    }

    /**
     * Get the message from name.
     *
     * @return string
     */
    public function getMessageFromName()
    {
        return $this->message_from_name;
    }

    /**
     * Get the message subject.
     *
     * @return string
     */
    public function getMessageSubject()
    {
        return $this->message_subject;
    }

    /**
     * Get the confirmation message.
     *
     * @return string
     */
    public function getConfirmationMessage()
    {
        return $this->confirmation_message;
    }

    /**
     * Get the confirmation redirect.
     *
     * @return string
     */
    public function getConfirmationRedirect()
    {
        return $this->confirmation_redirect;
    }
}
