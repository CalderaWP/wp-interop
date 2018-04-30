<?php


namespace calderawp\interopWP\Tests\Models;

use calderawp\interopWP\Models\Form;
use calderawp\interopWP\Tests\TestCase;

class FormTest extends TestCase
{

    /**
     *
     * @covers Form::toWpRestResponse
     * @covers ModelTrait::toWpRestResponse
     */
    public function testToWpRestResponse()
    {
        $formId = $this->formId();
        $formArray = $this->formArray($formId);
        $entity = new \calderawp\interop\Entities\Form($formArray);
        $model = new Form($entity);

        $response = $model->toWpRestResponse();
        $this->assertTrue(is_a($response, \WP_REST_Response::class));
        $this->assertEquals(200, $response->get_status());
        $this->assertSame($entity->toArray(), $response->get_data());
        $this->assertSame($model->toArray(), $response->get_data());
    }

    /**
     * @covers Form::fromWpRestRequest
     * @covers ModelTrait::fromWpRestRequest
     */
    public function testFromWpRestRequest()
    {
        $formId = $this->formId();
        $request = new \WP_REST_Request();
        $request->set_param('ID', $formId);

        $obj = Form::fromWpRestRequest($request);
        $this->assertEquals($formId, $obj->getId());
        $this->assertEquals($formId, $obj->getEntity()->getId());
    }
}
