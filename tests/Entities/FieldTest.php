<?php


namespace calderawp\interopWP\Tests\Entities;

use calderawp\interopWP\Entities\Field;
use calderawp\interopWP\Tests\TestCase;

/**
 * Class FieldTest
 *
 * @covers calderawp\interopWP\Entities\Field
 *
 * @package calderawp\interopWP\Tests\Entities
 */
class FieldTest extends TestCase
{
    /**
     * Test field conversion from WordPress
     *
     * @covers Field::fromWP()
     */
    public function testFromWP()
    {
        $fieldId = $this->fieldId();
        $field = $this->field($fieldId);
        $obj = Field::fromArray($field);
        $this->assertEquals($obj->getId(), $fieldId);
        $this->assertEquals($obj->toArray(), $field);
    }
}
