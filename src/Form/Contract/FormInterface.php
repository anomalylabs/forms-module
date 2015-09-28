<?php namespace Anomaly\FormsModule\Form\Contract;

use Anomaly\FormsModule\Form\Handler\Contract\FormHandlerExtensionInterface;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;

/**
 * Interface FormInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule\Form\Contract
 */
interface FormInterface extends EntryInterface
{

    /**
     * Get the form handler.
     *
     * @return FormHandlerExtensionInterface
     */
    public function getFormHandler();

    /**
     * Get the form view options.
     *
     * @return array
     */
    public function getFormViewOptions();

    /**
     * Get the form entries stream.
     *
     * @return StreamInterface
     */
    public function getFormEntriesStream();

    /**
     * Get the form slug.
     *
     * @return string
     */
    public function getFormSlug();

    /**
     * Get the message send to emails.
     *
     * @return array
     */
    public function getMessageSendTo();

    /**
     * Get the message from email.
     *
     * @return string
     */
    public function getMessageFromEmail();

    /**
     * Get the message from name.
     *
     * @return string
     */
    public function getMessageFromName();

    /**
     * Get the reply to email.
     *
     * @return string
     */
    public function getMessageReplyToEmail();

    /**
     * Get the reply to name.
     *
     * @return string
     */
    public function getMessageReplyToName();

    /**
     * Get the message subject.
     *
     * @return string
     */
    public function getMessageSubject();

    /**
     * Get the message CC emails.
     *
     * @return array
     */
    public function getMessageCc();

    /**
     * Get the message BCC emails.
     *
     * @return array
     */
    public function getMessageBcc();

    /**
     * Get the success message.
     *
     * @return string
     */
    public function getSuccessMessage();

    /**
     * Get the success redirect.
     *
     * @return string
     */
    public function getSuccessRedirect();

    /**
     * Return the autoresponder flag.
     *
     * @return bool
     */
    public function hasAutoresponder();

    /**
     * Get the autoresponder send to emails.
     *
     * @return array
     */
    public function getAutoresponderSendTo();

    /**
     * Get the autoresponder from email.
     *
     * @return string
     */
    public function getAutoresponderFromEmail();

    /**
     * Get the autoresponder from name.
     *
     * @return string
     */
    public function getAutoresponderFromName();

    /**
     * Get the reply to email.
     *
     * @return string
     */
    public function getAutoresponderReplyToEmail();

    /**
     * Get the reply to name.
     *
     * @return string
     */
    public function getAutoresponderReplyToName();

    /**
     * Get the autoresponder subject.
     *
     * @return string
     */
    public function getAutoresponderSubject();

    /**
     * Get the autoresponder CC emails.
     *
     * @return array
     */
    public function getAutoresponderCc();

    /**
     * Get the autoresponder BCC emails.
     *
     * @return array
     */
    public function getAutoresponderBcc();

    /**
     * Get the related actions.
     *
     * @return EntryCollection
     */
    public function getActions();

    /**
     * Get the related buttons.
     *
     * @return EntryCollection
     */
    public function getButtons();
}
