<?php


namespace calderawp\interopWP\Entities;

class Field extends \calderawp\interop\Entities\Field
{

    /**
     * @param array $field
     * @return static
     */
    public static function fromWP(array $field)
    {
        return static::fromArray($field)->setId($field['ID']);
    }
}
