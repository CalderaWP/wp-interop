<?php


namespace calderawp\interopWP\Collections\EntityCollections\EntryValues;

use calderawp\interop\App;
use calderawp\interopWP\Entities\Entry\Field;

class Fields extends \calderawp\interop\Collections\EntityCollections\EntryValues\Fields
{

    /**
     * @param \Caldera_Forms_Entry $entry
     * @return \calderawp\interop\Collections\Collection
     */
    public static function fromWp(\Caldera_Forms_Entry $entry)
    {
        $obj = new static();
        $fields = $entry->get_fields();
        $fieldValues = [];
        /** @var \Caldera_Forms_Entry_Field $field */
        foreach ($fields as $field) {
            $entryField = Field::fromWp($field);
            $obj->addField($entryField);
        }

        return $obj;
    }
}
