<?php


namespace calderawp\interopWP\Tests\Entities;

use calderawp\interopWP\Entities\Entry\Field;
use calderawp\interopWP\Tests\TestCase;

/**
 * Class FieldEntryTest
 *
 * @covers calderawp\interopWP\Entities\Entry\Field
 *
 * @package calderawp\interopWP\Tests\Entities
 */
class FieldEntryTest extends TestCase
{
    /**
     * Test create from WordPress object
     *
     * @covers Field::fromWp
     */
    public function testFromWp()
    {
        $wpField = $this->wpEntryFieldFactory('fld42');
        $field = Field::fromWp($wpField);
        $this->assertEquals($field->getId(), $wpField->id);
        $this->assertEquals($field->field_id, $wpField->field_id);
        $this->assertEquals($field->slug, $wpField->slug);
        $this->assertEquals($field->value, $wpField->value);
    }
}
