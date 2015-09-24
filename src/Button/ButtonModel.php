<?php namespace Anomaly\FormsModule\Button;

use Anomaly\FormsModule\Button\Contract\ButtonInterface;
use Anomaly\Streams\Platform\Model\Forms\FormsButtonsEntryModel;

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

}
