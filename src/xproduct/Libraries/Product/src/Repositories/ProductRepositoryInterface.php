<?php

namespace Xproduct\Libraries\Product\Repositories;

use Xproduct\Libraries\Product\Dtos\Product;

interface ProductRepositoryInterface
{
    /**
     * To Store Product
     *
     * @param Product $product
     *
     * @return void
     */
    public function store(Product $product);

    /**
     * List Products by filter
     *
     * @param array $request
     *
     * @return array
     */
    public function getByFilter($request): array;

    /**
     * @param int $categoryId
     *
     * @return array
     */
    public function getByCategory($categoryId): array;

    /**
     * @param string $sku
     *
     * @return array
     */
    public function getBySku(string $sku): array;
}
