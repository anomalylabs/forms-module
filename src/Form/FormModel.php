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
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->form_slug;
    }

    /**
     * Get the send to emails.
     *
     * @return array
     */
    public function getSendTo()
    {
        return $this->send_to;
    }

    /**
     * Get the from email.
     *
     * @return string
     */
    public function getFromEmail()
    {
        return $this->from_email;
    }

    /**
     * Get the from name.
     *
     * @return string
     */
    public function getFromName()
    {
        return $this->from_name;
    }
}
