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
        'form_name'                    => 'anomaly.field_type.text',
        'form_slug'                    => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'form_name'
            ]
        ],
        'handler'                      => [
            'type'   => 'anomaly.field_type.addon',
            'config' => [
                'type'          => 'extension',
                'search'        => 'anomaly.module.forms::form_handler.*',
                'default_value' => 'anomaly.extension.default_form_handler'
            ]
        ],
        'view_options'                 => [
            'type'   => 'anomaly.field_type.tags',
            'config' => [
                'handler'             => 'Anomaly\FormsModule\Form\Form\Field\ViewOptions@handle',
                'allow_creating_tags' => false
            ]
        ],
        'message_email_layout'         => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'handler' => 'emails'
            ]
        ],
        'message_content'              => 'anomaly.field_type.wysiwyg',
        'message_from_name'            => 'anomaly.field_type.text',
        'message_from_email'           => 'anomaly.field_type.text',
        'message_reply_to_name'        => 'anomaly.field_type.text',
        'message_reply_to_email'       => 'anomaly.field_type.text',
        'message_subject'              => 'anomaly.field_type.text',
        'message_send_to'              => [
            'type'   => 'anomaly.field_type.tags',
            'config' => [
                'filter' => [
                    'FILTER_VALIDATE_EMAIL'
                ]
            ]
        ],
        'message_cc'                   => [
            'type'   => 'anomaly.field_type.tags',
            'config' => [
                'filter' => [
                    'FILTER_VALIDATE_EMAIL'
                ]
            ]
        ],
        'message_bcc'                  => [
            'type'   => 'anomaly.field_type.tags',
            'config' => [
                'filter' => [
                    'FILTER_VALIDATE_EMAIL'
                ]
            ]
        ],
        'include_attachments'          => 'anomaly.field_type.boolean',
        'autoresponder'                => 'anomaly.field_type.boolean',
        'autoresponder_email_layout'   => [
            'type'   => 'anomaly.field_type.select',
            'config' => [
                'handler' => 'emails'
            ]
        ],
        'autoresponder_from_name'      => 'anomaly.field_type.text',
        'autoresponder_from_email'     => 'anomaly.field_type.text',
        'autoresponder_reply_to_name'  => 'anomaly.field_type.text',
        'autoresponder_reply_to_email' => 'anomaly.field_type.text',
        'autoresponder_subject'        => 'anomaly.field_type.text',
        'autoresponder_send_to'        => 'anomaly.field_type.text',
        'autoresponder_content'        => 'anomaly.field_type.wysiwyg',
        'autoresponder_cc'             => [
            'type'   => 'anomaly.field_type.tags',
            'config' => [
                'filter' => [
                    'FILTER_VALIDATE_EMAIL'
                ]
            ]
        ],
        'autoresponder_bcc'            => [
            'type'   => 'anomaly.field_type.tags',
            'config' => [
                'filter' => [
                    'FILTER_VALIDATE_EMAIL'
                ]
            ]
        ],
        'success_message'              => 'anomaly.field_type.textarea',
        'success_redirect'             => 'anomaly.field_type.text',
    ];

}
