<?php namespace Anomaly\FormsModule\Http\Controller\Admin;

use Anomaly\FormsModule\Form\Form\FormFormBuilder;
use Anomaly\FormsModule\Form\Table\FormTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class FormsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param FormTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(FormTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param FormFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(FormFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param FormFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(FormFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
