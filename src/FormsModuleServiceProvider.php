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
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        'Anomaly\FormsModule\FormsModulePlugin',
    ];

    /**
     * The addon routes.
     *
     * @var array
     */
    protected $routes = [
        'forms/handle/{form}'                            => [
            'method' => 'post',
            'uses'   => 'Anomaly\FormsModule\Http\Controller\FormsController@handle',
        ],
        'admin/forms'                                    => 'Anomaly\FormsModule\Http\Controller\Admin\FormsController@index',
        'admin/forms/choose'                             => 'Anomaly\FormsModule\Http\Controller\Admin\FormsController@choose',
        'admin/forms/create'                             => 'Anomaly\FormsModule\Http\Controller\Admin\FormsController@create',
        'admin/forms/edit/{id}'                          => 'Anomaly\FormsModule\Http\Controller\Admin\FormsController@edit',
        'admin/forms/help/{id}'                          => 'Anomaly\FormsModule\Http\Controller\Admin\FormsController@help',
        'admin/forms/entries/{form}'                     => 'Anomaly\FormsModule\Http\Controller\Admin\EntriesController@index',
        'admin/forms/entries/{form}/view/{id}'           => 'Anomaly\FormsModule\Http\Controller\Admin\EntriesController@view',
        'admin/forms/notifications'                      => 'Anomaly\FormsModule\Http\Controller\Admin\NotificationsController@index',
        'admin/forms/notifications/create'               => 'Anomaly\FormsModule\Http\Controller\Admin\NotificationsController@create',
        'admin/forms/notifications/edit/{id}'            => 'Anomaly\FormsModule\Http\Controller\Admin\NotificationsController@edit',
        'admin/forms/actions'                            => 'Anomaly\FormsModule\Http\Controller\Admin\ActionsController@index',
        'admin/forms/actions/create'                     => 'Anomaly\FormsModule\Http\Controller\Admin\ActionsController@create',
        'admin/forms/actions/edit/{id}'                  => 'Anomaly\FormsModule\Http\Controller\Admin\ActionsController@edit',
        'admin/forms/buttons'                            => 'Anomaly\FormsModule\Http\Controller\Admin\ButtonsController@index',
        'admin/forms/buttons/create'                     => 'Anomaly\FormsModule\Http\Controller\Admin\ButtonsController@create',
        'admin/forms/buttons/edit/{id}'                  => 'Anomaly\FormsModule\Http\Controller\Admin\ButtonsController@edit',
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
        'Anomaly\FormsModule\Form\Contract\FormRepositoryInterface'                 => 'Anomaly\FormsModule\Form\FormRepository',
        'Anomaly\FormsModule\Notification\Contract\NotificationRepositoryInterface' => 'Anomaly\FormsModule\Notification\NotificationRepository',
        'Anomaly\FormsModule\Form\Handler\Contract\FormHandlerRepositoryInterface'  => 'Anomaly\FormsModule\Form\Handler\FormHandlerRepository',
    ];

}
