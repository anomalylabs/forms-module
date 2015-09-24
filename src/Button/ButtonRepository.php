<?php namespace Anomaly\FormsModule\Button;

use Anomaly\FormsModule\Button\Contract\ButtonRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class ButtonRepository extends EntryRepository implements ButtonRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var ButtonModel
     */
    protected $model;

    /**
     * Create a new ButtonRepository instance.
     *
     * @param ButtonModel $model
     */
    public function __construct(ButtonModel $model)
    {
        $this->model = $model;
    }
}
