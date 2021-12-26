<?php

namespace App\Http\Controllers;

use App\ApiSchema\SchemaBase;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @param Request $request
     */
    public function __construct(
        protected Request $request
    ) {
    }

    /**
     * To get Requested data from JsonApi document
     *
     * @return array
     */
    public function getRequestedData()
    {
        $contentDecoded = json_decode($this->request->getContent(), true);
        return Arr::get($contentDecoded, "data", []);
    }
}
