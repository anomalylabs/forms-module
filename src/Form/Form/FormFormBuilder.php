<?php namespace Anomaly\FormsModule\Form\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class FormFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule\Form\Form
 */
class FormFormBuilder extends FormBuilder
{

    /**
     * The form sections.
     *
     * @var array
     */
    protected $sections = [
        [
            'tabs' => [
                'form'          => [
                    'title'  => 'anomaly.module.forms::tab.form',
                    'fields' => [
                        'form_name',
                        'form_slug',
                        'handler',
                        'confirmation_message',
                        'confirmation_redirect'
                    ]
                ],
                'message'       => [
                    'title'  => 'anomaly.module.forms::tab.message',
                    'fields' => [
                        'message_send_to',
                        'message_from_name',
                        'message_from_email',
                        'message_reply_to',
                        'message_subject',
                        'message_layout',
                        'message_content',
                        'message_cc',
                        'message_bcc',
                        'include_attachments',
                    ]
                ],
                'autoresponder' => [
                    'title'  => 'anomaly.module.forms::tab.autoresponder',
                    'fields' => [
                        'autoresponder',
                        'autoresponder_layout',
                        'autoresponder_from_name',
                        'autoresponder_reply_to',
                        'autoresponder_subject',
                        'autoresponder_send_to',
                        'autoresponder_from_email',
                        'autoresponder_cc',
                        'autoresponder_bcc',
                        'autoresponder_content',
                    ]
                ],
            ]
        ]
    ];

}
