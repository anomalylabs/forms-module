<?php namespace Anomaly\FormsModule\Form\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

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
     * Get the message subject.
     *
     * @return string
     */
    public function getMessageSubject();

    /**
     * Get the confirmation message.
     *
     * @return string
     */
    public function getConfirmationMessage();

    /**
     * Get the confirmation redirect.
     *
     * @return string
     */
    public function getConfirmationRedirect();
}
