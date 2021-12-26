<?php

namespace Xproduct\Libraries\Discount\Repositories;

use Xproduct\Libraries\Discount\Dtos\Discount;

interface DiscountRepositoryInterface
{
    /**
     * To Store Discount
     *
     * @param Discount $discount
     *
     * @return Discount
     */
    public function store(Discount $discount): Discount;
}
