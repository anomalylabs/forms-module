<?php namespace Anomaly\FormsModule\Http\Controller\Admin;

use Anomaly\FormsModule\Form\Contract\FormInterface;
use Anomaly\FormsModule\Form\Contract\FormRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class EntriesController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule\Http\Controller\Admin
 */
class EntriesController extends AdminController
{

    /**
     * @param TableBuilder              $table
     * @param StreamRepositoryInterface $streams
     * @param FormRepositoryInterface   $forms
     * @param                           $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(
        TableBuilder $table,
        StreamRepositoryInterface $streams,
        FormRepositoryInterface $forms,
        $id
    ) {
        /* @var FormInterface $form */
        $form = $forms->find($id);

        return $table->setModel($streams->findBySlugAndNamespace($form->getFormSlug(), 'forms')->getEntryModel())->render();
    }
}
