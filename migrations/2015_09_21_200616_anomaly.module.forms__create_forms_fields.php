<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleFormsCreateFormsFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleFormsCreateFormsFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'name'                => 'anomaly.field_type.text',
        'slug'                => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'form_name'
            ]
        ],
        'from_name'           => 'anomaly.field_type.text',
        'reply_to'            => 'anomaly.field_type.email',
        'subject'             => 'anomaly.field_type.text',
        'to'                  => [
            'type'   => 'anomaly.field_type.tags',
            'config' => [
                'filter' => [
                    'FILTER_VALIDATE_EMAIL'
                ]
            ]
        ],
        'from_email'          => 'anomaly.field_type.email',
        'cc'                  => [
            'type'   => 'anomaly.field_type.tags',
            'config' => [
                'filter' => [
                    'FILTER_VALIDATE_EMAIL'
                ]
            ]
        ],
        'bcc'                 => [
            'type'   => 'anomaly.field_type.tags',
            'config' => [
                'filter' => [
                    'FILTER_VALIDATE_EMAIL'
                ]
            ]
        ],
        'include_attachments' => 'anomaly.field_type.boolean',
    ];

}
