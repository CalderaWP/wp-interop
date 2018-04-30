<?php


namespace calderawp\interopWP\Entities;

class Form extends \calderawp\interop\Entities\Form
{

    /**
     * Create from array (as it is stored in WordPress)
     *
     * @param array $form
     * @return static
     */
    public static function fromWp(array $form)
    {
        $obj = parent::fromArray($form);
        $obj->setId($form['ID']);
        return $obj;
    }
}
