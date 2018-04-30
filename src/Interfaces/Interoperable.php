<?php


namespace calderawp\interopWP\Interfaces;

use calderawp\interop\Interfaces\Interoperable as CoreInteroperable;

interface Interoperable extends CoreInteroperable
{
    public static function fromWpRestRequest(\WP_Rest_Request $request);
    public function toWpRestResponse();
}
