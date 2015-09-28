<?php namespace Anomaly\FormsModule\Action;

use Anomaly\FormsModule\Action\Contract\ActionInterface;
use Anomaly\Streams\Platform\Model\Forms\FormsActionsEntryModel;

/**
 * Class ActionModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule\Action
 */
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

    /**
     * Return the button as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $action = [
            'slug' => $this->button_slug,
            'text' => $this->button_text,
            'type' => $this->button_type
        ];

        if ($this->redirect) {
            $action['redirect'] = $this->redirect;
        }

        return $action;
    }
}
