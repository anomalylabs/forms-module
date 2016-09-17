<?php namespace Anomaly\FormsModule\Http\Controller\Admin;

use Anomaly\FormsModule\Form\Contract\FormInterface;
use Anomaly\FormsModule\Form\Contract\FormRepositoryInterface;
use Anomaly\Streams\Platform\Assignment\Form\AssignmentFormBuilder;
use Anomaly\Streams\Platform\Assignment\Table\AssignmentTableBuilder;
use Anomaly\Streams\Platform\Field\Contract\FieldRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;

/**
 * Class AssignmentsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule\Http\Controller\Admin
 */
class AssignmentsController extends AdminController
{

    /**
     * @param AssignmentTableBuilder    $table
     * @param StreamRepositoryInterface $streams
     * @param FormRepositoryInterface   $forms
     * @param                           $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(
        AssignmentTableBuilder $table,
        StreamRepositoryInterface $streams,
        FormRepositoryInterface $forms,
        $id
    ) {
        /* @var FormInterface $form */
        $form = $forms->find($id);

        $table->setButtons(
            [
                'edit' => [
                    'href' => 'admin/forms/assignments/' . $form->getId() . '/edit/{entry.id}',
                ],
            ]
        );

        return $table->setStream($streams->findBySlugAndNamespace($form->getFormSlug(), 'forms'))->render();
    }

    /**
     * Return the modal for choosing a field to assign.
     *
     * @param FieldRepositoryInterface  $fields
     * @param StreamRepositoryInterface $streams
     * @param FormRepositoryInterface   $forms
     * @param                           $id
     * @return \Illuminate\View\View
     */
    public function choose(
        FieldRepositoryInterface $fields,
        StreamRepositoryInterface $streams,
        FormRepositoryInterface $forms,
        $id
    ) {
        /* @var FormInterface $form */
        /* @var StreamInterface $group */
        $form   = $forms->find($id);
        $stream = $streams->findBySlugAndNamespace($form->getFormSlug(), 'forms');

        return view(
            'module::ajax/choose_field',
            [
                'fields' => $fields->findAllByNamespace('forms')->notAssignedTo($stream)->unlocked(),
                'id'     => $id,
            ]
        );
    }

    /**
     * Create a new field assignment.
     *
     * @param AssignmentFormBuilder     $builder
     * @param FormRepositoryInterface   $forms
     * @param FieldRepositoryInterface  $fields
     * @param StreamRepositoryInterface $streams
     * @param                           $id
     * @param                           $field
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(
        AssignmentFormBuilder $builder,
        FormRepositoryInterface $forms,
        FieldRepositoryInterface $fields,
        StreamRepositoryInterface $streams,
        $id,
        $field
    ) {
        /* @var FormInterface $form */
        $form   = $forms->find($id);
        $stream = $streams->findBySlugAndNamespace($form->getFormSlug(), 'forms');

        return $builder
            ->setOption('redirect', 'admin/forms/assignments/' . $id)
            ->setField($fields->find($field))
            ->setStream($stream)
            ->render();
    }

    /**
     * Edit an existing field assignment.
     *
     * @param AssignmentFormBuilder     $builder
     * @param FormRepositoryInterface   $forms
     * @param StreamRepositoryInterface $streams
     * @param                           $id
     * @param                           $assignment
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(
        AssignmentFormBuilder $builder,
        FormRepositoryInterface $forms,
        StreamRepositoryInterface $streams,
        $id,
        $assignment
    ) {
        /* @var FormInterface $form */
        $form   = $forms->find($id);
        $stream = $streams->findBySlugAndNamespace($form->getFormSlug(), 'forms');

        return $builder
            ->setOption('redirect', 'admin/forms/assignments/' . $id)
            ->setStream($stream)
            ->render($assignment);
    }
}
