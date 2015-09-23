<?php namespace Anomaly\FormsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class FormsModule
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule
 */
class FormsModule extends Module
{

    /**
     * The navigation icon.
     *
     * @var string
     */
    protected $icon = 'list-alt';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'forms'       => [
            'buttons' => [
                'new_form'
            ]
        ],
        'assignments' => [
            'parent'  => 'forms',
            'buttons' => [
                'add_field' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/forms/assignments/{request.route.parameters.id}/choose'
                ]
            ]
        ],
        'fields'      => [
            'buttons' => [
                'new_field' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/forms/fields/choose'
                ]
            ]
        ]
    ];

}
