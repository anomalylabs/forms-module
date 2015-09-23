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
     * Get the slug.
     *
     * @return string
     */
    public function getSlug();

    /**
     * Get the send to emails.
     *
     * @return array
     */
    public function getSendTo();

    /**
     * Get the from email.
     *
     * @return string
     */
    public function getFromEmail();

    /**
     * Get the from name.
     *
     * @return string
     */
    public function getFromName();

    public function getSubject();
}
