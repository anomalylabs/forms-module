<?php namespace Anomaly\FormsModule\Http\Controller;

use Anomaly\FormsModule\Form\Command\SendFormMessage;
use Anomaly\FormsModule\Form\Contract\FormRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
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

    public function handle(FormRepositoryInterface $forms, StreamRepositoryInterface $streams, Redirector $redirect, $form)
    {
        $form = $forms->findBySlug($form);

        $stream = $streams->findBySlugAndNamespace($form->getFormSlug(), 'forms');

        /* @var FormBuilder $builder */
        $builder = app(FormBuilder::class)->setOption('config', $form);

        $builder->setOption('redirect', $form->getConfirmationRedirect());
        $builder->setOption('url', 'forms/handle/' . $form->getFormSlug());
        $builder->setOption('success_message', $form->getConfirmationMessage());

        $builder->on(
            'saved',
            function (FormBuilder $builder) {
                $this->dispatch(new SendFormMessage($builder));
            }
        );

        $builder->setModel($stream->getEntryModelName())->handle();

        if ($builder->hasFormErrors()) {
            return $redirect->back();
        }

        return $builder->getFormResponse();
    }

}
