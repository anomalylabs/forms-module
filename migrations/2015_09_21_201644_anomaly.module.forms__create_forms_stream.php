<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class AnomalyModuleFormsCreateFormsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'forms'
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [];

}
