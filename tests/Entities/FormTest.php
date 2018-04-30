<?php


namespace calderawp\interopWP\Tests\Entities;

use calderawp\interopWP\Entities\Form;
use calderawp\interopWP\Tests\TestCase;

class FormTest extends TestCase
{
    /**
     * Test conversion from WP object
     *
     * @covers Form::fromWp()
     */
    public function testFromWp()
    {
        $formId = $this->formId();
        $form = $this->formArray($formId);
        $formEntity = Form::fromWp($form);

        $this->assertEquals($formId, $formEntity->getId());
    }
}
