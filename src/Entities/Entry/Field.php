<?php


namespace calderawp\interopWP\Entities\Entry;

use calderawp\interop\App;

class Field extends \calderawp\interop\Entities\Entry\Field
{

    /**
     * Create from WordPress object
     *
     * @param \Caldera_Forms_Entry_Field $field
     *
     * @return static
     */
    public static function fromWp(\Caldera_Forms_Entry_Field $field)
    {
        return new static(
            [
                'id' => $field->id,
                'entry_id' => $field->entry_id,
                'slug' => $field->slug,
                'value' => $field->value,
                'field_id' => $field->field_id
            ]
        );
    }
}
