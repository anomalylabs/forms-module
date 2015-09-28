<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleFormsCreateFormsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleFormsCreateFormsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'forms',
        'title_column' => 'form_name',
        'translatable' => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'form_name'        => [
            'required' => true
        ],
        'form_description',
        'form_slug'        => [
            'unique'   => true,
            'required' => true
        ],
        'form_handler'     => [
            'required' => true
        ],
        'form_view_options',
        'success_message'  => [
            'translatable' => true
        ],
        'success_redirect' => [
            'translatable' => true
        ],
        'notification',
        'autoresponder',
        'actions',
        'buttons'
    ];

}
