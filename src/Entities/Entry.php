<?php


namespace calderawp\interopWP\Entities;

use calderawp\interop\App;
use calderawp\interop\Traits\CanRecursivelyCastArray;
use calderawp\interopWP\Collections\EntityCollections\EntryValues\Fields;
use calderawp\interopWP\Entities\Entry\Details;
use \calderawp\interopWP\Entities\Entry\Field;

class Entry extends \calderawp\interop\Entities\Entry
{
    use CanRecursivelyCastArray;
    /**
     * Factory to create from WordPress
     *
     * @param \Caldera_Forms_Entry $entry WordPress entry object
     * @param App $app App instance
     * @return static
     */
    public static function fromWP(\Caldera_Forms_Entry $entry)
    {
        $entryDetails = new Details();

        $fieldValues = [];
        foreach ($entry->get_fields() as $id => $field) {
            if (is_a($field, Field::class)) {
                $fieldValues[] = $field;
            } else {
                if (is_a($field, \stdClass::class)) {
                    $field = self::arrayCastRecursiveStatic($field);
                } elseif (is_a($field, \Caldera_Forms_Entry_Field::class)) {
                    $fieldValues[] = Field::fromWp($field);
                    continue;
                }
                $fieldValues[] = Field::fromArray($field);
            }
        }

        $fields = new Fields($fieldValues);

        $formArray = $entry->get_form();

        $form = Form::fromArray($formArray);

        return new static($entryDetails, $fields, $form);
    }
}
