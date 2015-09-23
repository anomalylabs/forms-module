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
        'title_column' => 'form_name'
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'form_name'          => [
            'required' => true
        ],
        'form_slug'          => [
            'unique'   => true,
            'required' => true
        ],
        'handler'            => [
            'required' => true
        ],
        'message_layout',
        'message_content'    => [
            'required' => true
        ],
        'message_from_name'  => [
            'required' => true
        ],
        'message_from_email' => [
            'required' => true
        ],
        'message_reply_to'   => [
            'required' => true
        ],
        'message_subject'    => [
            'required' => true
        ],
        'message_send_to'    => [
            'required' => true
        ],
        'message_cc',
        'message_bcc',
        'include_attachments',
        'autoresponder',
        'autoresponder_layout',
        'autoresponder_content',
        'autoresponder_from_name',
        'autoresponder_from_email',
        'autoresponder_reply_to',
        'autoresponder_subject',
        'autoresponder_send_to',
        'autoresponder_cc',
        'autoresponder_bcc',
        'confirmation_message',
        'confirmation_redirect'
    ];

}
