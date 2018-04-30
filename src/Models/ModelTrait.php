<?php


namespace calderawp\interopWP\Models;

use calderawp\interop\Models\Model;

trait ModelTrait
{


    /**
     * @param bool $valid Is valid or not. Default is true
     */
    protected function setValid($valid = true)
    {
        $this->valid = $valid;
    }

    /**
     * Creates empty response object with status code set
     *
     * @return \WP_REST_Response
     */
    protected function createResponse()
    {
        $response = new \WP_REST_Response();
        if (is_null($this->valid)) {
            $this->setValid(true);
        }
        if ($this->isValid()) {
            $response->set_status(200);
        } else {
            $response->set_status(500);
        }

        return $response;
    }


    /**
     * @return \WP_REST_Response
     */
    public function toWpRestResponse()
    {
        $response = $this->createResponse();
        if ($this->isValid()) {
            $response->set_data($this->toArray());
        }

        return $response;
    }


    /**
     * @param \WP_REST_Request $request
     * @return Model
     */
    public static function fromWpRestRequest(\WP_REST_Request $request)
    {

        /** @var ModelTrait $obj */
        $obj = static::fromArray([]);
        foreach ($obj->getEntity()->getEntityProps() as $prop) {
            $obj->getEntity()->$prop = $request->get_param($prop);
        }

        return $obj;
    }
}
