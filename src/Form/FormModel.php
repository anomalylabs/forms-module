<?php namespace Anomaly\FormsModule\Form;

use Anomaly\FormsModule\Form\Command\GetFormEntriesStream;
use Anomaly\FormsModule\Form\Contract\FormInterface;
use Anomaly\FormsModule\Form\Handler\Contract\FormHandlerExtensionInterface;
use Anomaly\Streams\Platform\Model\Forms\FormsFormsEntryModel;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;

/**
 * Class FormModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule\Form
 */
class FormModel extends FormsFormsEntryModel implements FormInterface
{

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        self::observe(app(substr(__CLASS__, 0, -5) . 'Observer'));

        parent::boot();
    }

    /**
     * Get the handler.
     *
     * @return FormHandlerExtensionInterface
     */
    public function getHandler()
    {
        return $this->handler;
    }

    /**
     * Get the form entries stream.
     *
     * @return StreamInterface
     */
    public function getFormEntriesStream()
    {
        return $this->dispatch(new GetFormEntriesStream($this));
    }

    /**
     * Get the form slug.
     *
     * @return string
     */
    public function getFormSlug()
    {
        return $this->form_slug;
    }

    /**
     * Get the message send to emails.
     *
     * @return array
     */
    public function getMessageSendTo()
    {
        return $this->message_send_to;
    }

    /**
     * Get the message from email.
     *
     * @return string
     */
    public function getMessageFromEmail()
    {
        return $this->message_from_email;
    }

    /**
     * Get the message from name.
     *
     * @return string
     */
    public function getMessageFromName()
    {
        return $this->message_from_name;
    }

    /**
     * Get the reply to email.
     *
     * @return string
     */
    public function getMessageReplyToEmail()
    {
        return $this->message_reply_to_email;
    }

    /**
     * Get the reply to name.
     *
     * @return string
     */
    public function getMessageReplyToName()
    {
        return $this->message_reply_to_name;
    }

    /**
     * Get the message subject.
     *
     * @return string
     */
    public function getMessageSubject()
    {
        return $this->message_subject;
    }

    /**
     * Get the message CC emails.
     *
     * @return array
     */
    public function getMessageCc()
    {
        return $this->message_cc;
    }

    /**
     * Get the message BCC emails.
     *
     * @return array
     */
    public function getMessageBcc()
    {
        return $this->message_bcc;
    }

    /**
     * Get the success message.
     *
     * @return string
     */
    public function getSuccessMessage()
    {
        return $this->success_message;
    }

    /**
     * Get the success redirect.
     *
     * @return string
     */
    public function getSuccessRedirect()
    {
        return $this->success_redirect;
    }

    /**
     * Return the autoresponder flag.
     *
     * @return bool
     */
    public function hasAutoresponder()
    {
        return $this->autoresponder;
    }
}
