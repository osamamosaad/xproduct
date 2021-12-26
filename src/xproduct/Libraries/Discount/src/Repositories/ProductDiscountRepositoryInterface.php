<?php

namespace Xproduct\Libraries\Discount\Repositories;

interface ProductDiscountRepositoryInterface
{
    /**
     * Store Product discount with final price
     *
     * @param integer $productId
     * @param integer $discountId
     * @param integer $finalPrice
     *
     * @return void
     */
    public function store(int $productId, int $discountId, float $finalPrice);
}
