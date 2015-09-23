<?php namespace Anomaly\FormsModule\Form;

use Anomaly\FormsModule\Form\Contract\FormRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

/**
 * Class FormRepository
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule\Form
 */
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
