<?php namespace Anomaly\FormsModule\Form;

use Anomaly\FormsModule\Form\Command\CreateFormEntriesStream;
use Anomaly\FormsModule\Form\Command\DeleteFormEntriesStream;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

/**
 * Class FormObserver
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule\Form
 */
class FormObserver extends EntryObserver
{

    /**
     * Fired after the entry is created.
     *
     * @param EntryInterface $entry
     */
    public function created(EntryInterface $entry)
    {
        $this->dispatch(new CreateFormEntriesStream($entry));

        parent::created($entry);
    }

    /**
     * Fired after the entry is deleted.
     *
     * @param EntryInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        $this->dispatch(new DeleteFormEntriesStream($entry));

        parent::created($entry);
    }
}
