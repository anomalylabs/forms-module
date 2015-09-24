<?php namespace Anomaly\FormsModule\Action;

use Anomaly\FormsModule\Action\Contract\ActionInterface;
use Anomaly\Streams\Platform\Model\Forms\FormsActionsEntryModel;

class ActionModel extends FormsActionsEntryModel implements ActionInterface
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
