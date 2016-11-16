<?php namespace Anomaly\FormsModule\Http\Controller;

use Anomaly\FormsModule\Form\Contract\FormRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Routing\Redirector;

/**
 * Class FormsController
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule\Http\Controller
 */
class FormsController extends PublicController
{

    /**
     * Handle the form POST.
     *
     * @param FormRepositoryInterface $forms
     * @param Redirector              $redirect
     * @param                         $form
     * @return \Illuminate\Http\RedirectResponse|null|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function handle(FormRepositoryInterface $forms, Redirector $redirect, $form)
    {
        $form = $forms->findBySlug($form);

        $handler = $form->getFormHandler();
        $builder = $handler->builder($form);

        $response = $builder
            ->build()
            ->post()
            ->getFormResponse();

        $builder->flash();

        if ($builder->hasFormErrors()) {
            return $redirect->back();
        }

        return $response;
    }
}
