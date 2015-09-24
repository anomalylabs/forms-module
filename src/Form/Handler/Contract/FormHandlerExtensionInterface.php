<?php namespace Anomaly\FormsModule\Form\Handler\Contract;

use Anomaly\FormsModule\Form\Contract\FormInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Anomaly\Streams\Platform\Ui\Form\Multiple\MultipleFormBuilder;

/**
 * Interface FormHandlerExtensionInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FormsModule\Form\Handler\Contract
 */
interface FormHandlerExtensionInterface
{

    /**
     * Return the form's builder instance.
     *
     * @param FormInterface $form
     * @return FormBuilder
     */
    public function builder(FormInterface $form);

    /**
     * Integrate the form handler's services
     * with the primary form's builder instance.
     *
     * @param MultipleFormBuilder $builder
     */
    public function integrate(MultipleFormBuilder $builder);
}
