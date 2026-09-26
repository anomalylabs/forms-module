<?php namespace Anomaly\FormsModule\Form;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Support\Parser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class NotificationValue
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class NotificationValue
{

    /**
     * The string parser.
     *
     * @var Parser
     */
    protected $parser;

    /**
     * Create a new NotificationValue instance.
     *
     * @param Parser $parser
     */
    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Resolve a notification setting against a submitted entry.
     *
     * A value naming one of the entry's fields, with or without
     * an "input." prefix, returns that field's value. Anything
     * else has {input.*} placeholders substituted and is
     * otherwise returned as written.
     *
     * @param  mixed          $value
     * @param  EntryInterface $entry
     * @return mixed
     */
    public function make($value, EntryInterface $entry)
    {
        if (!is_string($value) || $value === '') {
            return $value;
        }

        $field = Str::startsWith($value, 'input.') ? substr($value, 6) : $value;

        if ($entry->getField($field)) {

            if ($entry->assignmentIsRelationship($field) && $relation = $entry->{camel_case($field)}) {
                return $relation instanceof Model ? $relation->getTitle() : $value;
            }

            return (string)$entry->getFieldValue($field);
        }

        return $this->parser->parse($value, ['input' => $entry->toArray()]);
    }
}
