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
}
