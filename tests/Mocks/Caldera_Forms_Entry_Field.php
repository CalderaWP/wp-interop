<?php
// phpcs:ignore


class Caldera_Forms_Entry_Field
{


    /** @var  string */
    public $id;

    /** @var  string */
    public $entry_id;

    /** @var  string */
    public $field_id;

    /** @var  string */
    public $slug;

    /** @var  string|array */
    public $value;

    public function apply_filter($property, $value)
    {
        return $value;
    }
}
