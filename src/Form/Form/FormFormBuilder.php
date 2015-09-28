<?php namespace Anomaly\FormsModule\Form\Form;

use Anomaly\FormsModule\Form\Handler\Contract\FormHandlerExtensionInterface;
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
     * The form handler extension.
     *
     * @var FormHandlerExtensionInterface
     */
    protected $formHandler;

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        '*',
        'form_slug'    => [
            'disabled' => 'edit'
        ],
        'view_options' => [
            'enabled' => 'edit'
        ]
    ];

    /**
     * Skip these fields.
     *
     * @var array
     */
    protected $skips = [
        'handler'
    ];

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
                        'success_message',
                        'success_redirect',
                        'view_options'
                    ]
                ],
                'message'       => [
                    'title'  => 'anomaly.module.forms::tab.message',
                    'fields' => [
                        'message_send_to',
                        'message_from_name',
                        'message_from_email',
                        'message_reply_to_name',
                        'message_reply_to_email',
                        'message_subject',
                        'message_email_layout',
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
                        'autoresponder_email_layout',
                        'autoresponder_from_name',
                        'autoresponder_from_email',
                        'autoresponder_reply_to_name',
                        'autoresponder_reply_to_email',
                        'autoresponder_subject',
                        'autoresponder_send_to',
                        'autoresponder_cc',
                        'autoresponder_bcc',
                        'autoresponder_content',
                    ]
                ],
            ]
        ]
    ];

    /**
     * Fired when builder is ready to build.
     *
     * @throws \Exception
     */
    public function onReady()
    {
        if (!$this->getFormHandler() && !$this->getEntry()) {
            throw new \Exception('The $formHandler parameter is required when creating a form.');
        }
    }

    /**
     * Fired when form is saving.
     */
    public function onSaving()
    {
        $entry = $this->getFormEntry();

        if (!$entry->exists) {
            $entry->handler = $this->getFormHandler();
        }
    }

    /**
     * Get the form handler extension.
     *
     * @return FormHandlerExtensionInterface
     */
    public function getFormHandler()
    {
        return $this->formHandler;
    }

    /**
     * Set the form handler extension.
     *
     * @param FormHandlerExtensionInterface $formHandler
     * @return $this
     */
    public function setFormHandler(FormHandlerExtensionInterface $formHandler)
    {
        $this->formHandler = $formHandler;

        return $this;
    }
}
