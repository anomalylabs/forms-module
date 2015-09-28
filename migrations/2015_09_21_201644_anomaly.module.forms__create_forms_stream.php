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
        'form_name'                    => [
            'required' => true
        ],
        'form_slug'                    => [
            'unique'   => true,
            'required' => true
        ],
        'handler'                      => [
            'required' => true
        ],
        'view_options',
        'message_email_layout',
        'message_content'              => [
            'required'     => true,
            'translatable' => true
        ],
        'message_from_name'            => [
            'required'     => true,
            'translatable' => true
        ],
        'message_from_email'           => [
            'required' => true
        ],
        'message_reply_to_name'        => [
            'required' => true
        ],
        'message_reply_to_email'       => [
            'required' => true
        ],
        'message_subject'              => [
            'required'     => true,
            'translatable' => true
        ],
        'message_send_to'              => [
            'required'     => true,
            'translatable' => true
        ],
        'message_cc'                   => [
            'translatable' => true
        ],
        'message_bcc'                  => [
            'translatable' => true
        ],
        'include_attachments',
        'autoresponder',
        'autoresponder_email_layout',
        'autoresponder_content'        => [
            'translatable' => true
        ],
        'autoresponder_from_name'      => [
            'translatable' => true
        ],
        'autoresponder_from_email',
        'autoresponder_reply_to_name'  => [
            'translatable' => true
        ],
        'autoresponder_reply_to_email' => [
            'translatable' => true
        ],
        'autoresponder_subject'        => [
            'translatable' => true
        ],
        'autoresponder_send_to',
        'autoresponder_cc',
        'autoresponder_bcc',
        'success_message'              => [
            'translatable' => true
        ],
        'success_redirect'             => [
            'translatable' => true
        ]
    ];

}
