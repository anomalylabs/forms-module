<?php namespace Anomaly\FormsModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class FormsModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule
 */
class FormsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'admin/forms'                                    => 'Anomaly\FormsModule\Http\Controller\Admin\FormsController@index',
        'admin/forms/create'                             => 'Anomaly\FormsModule\Http\Controller\Admin\FormsController@create',
        'admin/forms/edit/{id}'                          => 'Anomaly\FormsModule\Http\Controller\Admin\FormsController@edit',
        'admin/forms/fields'                             => 'Anomaly\FormsModule\Http\Controller\Admin\FieldsController@index',
        'admin/forms/fields/choose'                      => 'Anomaly\FormsModule\Http\Controller\Admin\FieldsController@choose',
        'admin/forms/fields/create'                      => 'Anomaly\FormsModule\Http\Controller\Admin\FieldsController@create',
        'admin/forms/fields/edit/{id}'                   => 'Anomaly\FormsModule\Http\Controller\Admin\FieldsController@edit',
        'admin/forms/assignments/{id}'                   => 'Anomaly\FormsModule\Http\Controller\Admin\AssignmentsController@index',
        'admin/forms/assignments/{id}/choose'            => 'Anomaly\FormsModule\Http\Controller\Admin\AssignmentsController@choose',
        'admin/forms/assignments/{id}/create/{field}'    => 'Anomaly\FormsModule\Http\Controller\Admin\AssignmentsController@create',
        'admin/forms/assignments/{id}/edit/{assignment}' => 'Anomaly\FormsModule\Http\Controller\Admin\AssignmentsController@edit',
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\FormsModule\Form\Contract\FormRepositoryInterface' => 'Anomaly\FormsModule\Form\FormRepository'
    ];

}
