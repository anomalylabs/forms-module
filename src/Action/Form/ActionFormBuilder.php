<?php namespace Anomaly\FormsModule\Action\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class ActionFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule\Action\Form
 */
class ActionFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array|string
     */
    protected $fields = [
        '*',
        'button_slug' => [
            'read_only' => true
        ]
    ];

}
