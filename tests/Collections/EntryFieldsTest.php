<?php


namespace calderawp\interopWP\Tests\Collections;

use calderawp\interopWP\Collections\EntityCollections\EntryValues\Fields;
use calderawp\interopWP\Tests\TestCase;

/**
 * Class EntryFieldsTest
 *
 * @covers \calderawp\interopWP\Collections\EntityCollections\EntryValues\Fields
 *
 * @package calderawp\interopWP\Tests\Collections
 */
class EntryFieldsTest extends TestCase
{
    public function testFromWp()
    {
        $mockEntry = $this->wpCreateMockEntry();
        $obj = Fields::fromWp($mockEntry);
        $this->assertEquals(5, count($obj->toArray()));
    }
}
