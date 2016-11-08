<?php namespace Anomaly\FormsModule\Http\Controller\Admin;

use Anomaly\FormsModule\Entry\Table\EntryTableBuilder;
use Anomaly\FormsModule\Form\Contract\FormInterface;
use Anomaly\FormsModule\Form\Contract\FormRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

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
     * @param EntryTableBuilder $table
     * @param StreamRepositoryInterface $streams
     * @param FormRepositoryInterface $forms
     * @param                           $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(
        EntryTableBuilder $table,
        StreamRepositoryInterface $streams,
        FormRepositoryInterface $forms,
        $form
    ) {
        /* @var FormInterface $form */
        $form = $forms->find($form);

        $stream = $streams->findBySlugAndNamespace($form->getFormSlug(), 'forms');

        return $table
            ->setModel($stream->getEntryModel())
            ->setFilters($form->getFormViewOptions())
            ->setColumns(array_merge(['entry.created_at'], $form->getFormViewOptions()))
            ->render();
    }

    /**
     * Return the readonly view for an entry.
     *
     * @param FormBuilder $generic
     * @param FormRepositoryInterface $forms
     * @param                         $form
     * @param                         $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function view(
        FormBuilder $generic,
        FormRepositoryInterface $forms,
        $form,
        $id
    ) {
        /* @var FormInterface $form */
        $form = $forms->find($form);

        $handler = $form->getFormHandler();
        $builder = $handler->builder($form);

        return $generic
            ->setSave(false)
            ->setReadOnly(true)
            ->setButtons(['cancel'])
            ->setModel($builder->getModel())
            ->setFields($builder->getFields())
            ->render($id);
    }
}
