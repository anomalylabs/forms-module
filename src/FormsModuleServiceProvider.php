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
        'admin/forms/fields'           => 'Anomaly\FormsModule\Http\Controller\Admin\FieldsController@index',
        'admin/forms/fields/choose'    => 'Anomaly\FormsModule\Http\Controller\Admin\FieldsController@choose',
        'admin/forms/fields/create'    => 'Anomaly\FormsModule\Http\Controller\Admin\FieldsController@create',
        'admin/forms/fields/edit/{id}' => 'Anomaly\FormsModule\Http\Controller\Admin\FieldsController@edit',
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [];

}
