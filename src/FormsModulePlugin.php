<?php namespace Anomaly\FormsModule;

use Anomaly\FormsModule\Form\Contract\FormRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\Streams\Platform\Support\Decorator;

/**
 * Class FormsModulePlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule
 */
class FormsModulePlugin extends Plugin
{

    /**
     * The form repository.
     *
     * @var FormRepositoryInterface
     */
    protected $forms;

    /**
     * The presenter decorator.
     *
     * @var Decorator
     */
    protected $decorator;

    /**
     * Create a new FormsModulePlugin instance.
     *
     * @param FormRepositoryInterface $forms
     * @param Decorator               $decorator
     */
    public function __construct(FormRepositoryInterface $forms, Decorator $decorator)
    {
        $this->forms     = $forms;
        $this->decorator = $decorator;
    }

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'forms_get',
                function ($slug) {

                    if (!$form = $this->forms->findBySlug($slug)) {
                        return null;
                    }

                    $handler = $form->getHandler();
                    $builder = $handler->builder($form);

                    return $this->decorator->decorate(
                        $builder->make()->getForm()
                    );
                },
                ['is_safe' => ['html']]
            )
        ];
    }
}
