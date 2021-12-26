<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Xproduct\Infrastructure\Adapters\Request as InfrastructurRequestInterface;

class Controller extends BaseController
{
    /**
     * @param Request $request
     */
    public function __construct(
        protected Request $request,
        protected InfrastructurRequestInterface $infrastructurRequest,
    ) {
    }

    /**
     * To get Requested data from JsonApi document
     *
     * @return InfrastructurRequestInterface
     */
    public function getRequest()
    {
        return $this->infrastructurRequest->setData($this->request->all());
    }
}
