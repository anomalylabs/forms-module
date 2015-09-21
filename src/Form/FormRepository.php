<?php namespace Anomaly\FormsModule\Form;

use Anomaly\FormsModule\Form\Contract\FormRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class FormRepository extends EntryRepository implements FormRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var FormModel
     */
    protected $model;

    /**
     * Create a new FormRepository instance.
     *
     * @param FormModel $model
     */
    public function __construct(FormModel $model)
    {
        $this->model = $model;
    }
}
