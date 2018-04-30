<?php


namespace calderawp\interopWP\Models;

class Form extends \calderawp\interop\Models\Form
{
    use ModelTrait;
    public function getEntityType()
    {
        return Form::class;
    }
}
