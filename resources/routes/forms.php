<?php

return [
    'admin/forms'           => 'Anomaly\FormsModule\Http\Controller\Admin\FormsController@index',
    'admin/forms/create'    => 'Anomaly\FormsModule\Http\Controller\Admin\FormsController@create',
    'admin/forms/edit/{id}' => 'Anomaly\FormsModule\Http\Controller\Admin\FormsController@edit'
];
