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
     * To handle company data that comes from presentation layer
     *
     * @param array $requestData
     *
     * @return array
     */
    public function get(RequestInterface $requestData)
    {
        return $this->productRepo->getByFilter($requestData);
    }
}
