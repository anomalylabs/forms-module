<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleFormsCreateButtonsStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleFormsCreateButtonsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'buttons',
        'title_column' => 'button_text',
        'translatable' => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'button_type' => [
            'required' => true
        ],
        'button_text' => [
            'required'     => true,
            'translatable' => true
        ],
        'button_slug' => [
            'required' => true,
            'unique'   => true
        ],
        'button_href' => [
            'required' => true
        ]
    ];

}
