<?php namespace Anomaly\FormsModule\Notification;

use Anomaly\FormsModule\Notification\Contract\NotificationInterface;
use Anomaly\Streams\Platform\Model\Forms\FormsNotificationsEntryModel;

class NotificationModel extends FormsNotificationsEntryModel implements NotificationInterface
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
