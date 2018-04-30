<?php


namespace calderawp\interopWP\Entities\Entry;

class Details extends \calderawp\interop\Entities\Entry\Details
{

    /**
     * Translate from WordPress object to Interop object
     *
     * @param \Caldera_Forms_Entry_Entry $entry
     * @return static
     */
    public static function fromWP(\Caldera_Forms_Entry_Entry $entry)
    {
        return static::fromArray(
            [
                'id' => $entry->id,
                'form_id' => $entry->form_id,
                'user_id' => $entry->user_id,
                'datestamp' => $entry->datestamp
            ]
        );
    }
}
