<?php namespace Anomaly\FormsModule\Button;

use Anomaly\FormsModule\Button\Contract\ButtonInterface;
use Anomaly\Streams\Platform\Model\Forms\FormsButtonsEntryModel;

/**
 * Class ButtonModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule\Button
 */
class ButtonModel extends FormsButtonsEntryModel implements ButtonInterface
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
     * Return the button as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'slug' => $this->button_slug,
            'text' => $this->button_text,
            'type' => $this->button_type
        ];
    }
}
