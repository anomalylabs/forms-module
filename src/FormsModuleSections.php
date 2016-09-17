<?php namespace Anomaly\FormsModule;

use Anomaly\Streams\Platform\Ui\ControlPanel\ControlPanelBuilder;

/**
 * Class FormsModuleSections
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\FormsModule
 */
class FormsModuleSections
{

    /**
     * Handle the module sections.
     *
     * @param ControlPanelBuilder $builder
     */
    public function handle(ControlPanelBuilder $builder)
    {
        $builder->setSections(
            [
                'forms'         => [
                    'buttons' => [
                        'new_form' => [
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                            'href'        => 'admin/forms/choose',
                        ],
                        'export'   => [
                            'enabled'   => 'admin/forms/entries/*',
                            'namespace' => 'forms',
                            'stream'    => 'contact',
                        ],
                    ],
                ],
                'assignments'   => [
                    'parent'  => 'forms',
                    'buttons' => [
                        'add_field' => [
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                            'href'        => 'admin/forms/assignments/{request.route.parameters.id}/choose',
                        ],
                    ],
                ],
                'notifications' => [
                    'buttons' => [
                        'new_notification',
                    ],
                ],
                'fields'        => [
                    'buttons' => [
                        'new_field' => [
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                            'href'        => 'admin/forms/fields/choose',
                        ],
                    ],
                ],
            ]
        );
    }
}
