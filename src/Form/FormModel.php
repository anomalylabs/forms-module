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
}
