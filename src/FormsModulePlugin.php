<?php namespace Anomaly\FormsModule;

use Anomaly\FormsModule\Form\Command\SendFormMessage;
use Anomaly\FormsModule\Form\Contract\FormRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Anomaly\Streams\Platform\Support\Decorator;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

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
     * The stream repository.
     *
     * @var StreamRepositoryInterface
     */
    protected $streams;

    /**
     * The presenter decorator.
     *
     * @var Decorator
     */
    protected $decorator;

    /**
     * Create a new FormsModulePlugin instance.
     *
     * @param FormRepositoryInterface   $forms
     * @param StreamRepositoryInterface $streams
     * @param Decorator                 $decorator
     */
    public function __construct(
        FormRepositoryInterface $forms,
        StreamRepositoryInterface $streams,
        Decorator $decorator
    ) {
        $this->forms     = $forms;
        $this->streams   = $streams;
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

                    $form   = $this->forms->findBySlug($slug);
                    $stream = $this->streams->findBySlugAndNamespace($form->getFormSlug(), 'forms');

                    /* @var FormBuilder $builder */
                    $builder = app(FormBuilder::class)->setOption('config', $form);

                    $builder->setActions(['submit']);
                    $builder->setOption('redirect', $form->getConfirmationRedirect());
                    $builder->setOption('url', 'forms/handle/' . $form->getFormSlug());

                    $builder->on(
                        'saving',
                        function (FormBuilder $builder) {
                            $this->dispatch(new SendFormMessage($builder));
                        }
                    );

                    return $this->decorator->decorate(
                        $builder->setModel($stream->getEntryModelName())->make()->getForm()
                    );
                }
                , ['is_safe' => ['html']]
            )
        ];
    }
}
