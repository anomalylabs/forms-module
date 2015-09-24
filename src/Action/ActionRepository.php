<?php namespace Anomaly\FormsModule\Action;

use Anomaly\FormsModule\Action\Contract\ActionRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class ActionRepository extends EntryRepository implements ActionRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var ActionModel
     */
    protected $model;

    /**
     * Create a new ActionRepository instance.
     *
     * @param ActionModel $model
     */
    public function __construct(ActionModel $model)
    {
        $this->model = $model;
    }
}
