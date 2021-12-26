<?php

namespace Xproduct\Application\Queries;

use Xproduct\Libraries\Common\RequestInterface;
use Xproduct\Libraries\Product\Repositories\ProductRepositoryInterface;

class GetProductsQuery
{
    /**
     * @param ProductRepositoryInterface $productRepo
     */
    public function __construct(
        private ProductRepositoryInterface $productRepo
    ) {
    }

    /**
     * To handle Product data that comes from presentation layer
     *
     * @param RequestInterface $requestData
     *
     * @return array
     */
    public function get(RequestInterface $requestData)
    {
        return $this->productRepo->getByFilter($requestData);
    }
}
