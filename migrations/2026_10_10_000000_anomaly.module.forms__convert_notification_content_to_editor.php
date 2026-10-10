<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleFormsConvertNotificationContentToEditor
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 */
class AnomalyModuleFormsConvertNotificationContentToEditor extends Migration
{

    /**
     * The default notification content.
     *
     * @var string
     */
    protected $default = '<h3>{{ form.form_name }}</h3><p><a href="{{ url_previous() }}">{{ url_previous() }}</a></p><hr><p><em>{{ form.form_description }}</em><br>{{ forms_input(input)|raw }}</p>';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!$field = $this->fields()->findBySlugAndNamespace('notification_content', 'forms')) {
            return;
        }

        if ($field->getTypeValue() == 'anomaly.field_type.editor') {
            return;
        }

        $field->setAttribute('type', 'anomaly.field_type.editor');
        $field->setAttribute(
            'config',
            [
                'mode'          => 'twig',
                'default_value' => $this->default,
            ]
        );

        $this->fields()->save($field);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!$field = $this->fields()->findBySlugAndNamespace('notification_content', 'forms')) {
            return;
        }

        $field->setAttribute('type', 'anomaly.field_type.wysiwyg');
        $field->setAttribute(
            'config',
            [
                'default_value' => $this->default,
            ]
        );

        $this->fields()->save($field);
    }
}
