<?php

namespace Xproduct\Libraries\Discount;

use Xproduct\Libraries\Discount\Dtos\Discount as DiscountDto;
use Xproduct\Libraries\Discount\Repositories\DiscountRepositoryInterface;

class Discount
{

    /**
     * @param ProductRepositoryInterface $productRepo
     */
    public function __construct(
        private DiscountRepositoryInterface $discountRepo,
        private ApplyProductDiscount $applyProductDiscount,
    ) {
    }

    /**
     * Execute creating discount
     *
     * @param DiscountDto $discountDto
     *
     * @return void
     */
    public function execute(DiscountDto $discountDto)
    {
        $discount = $this->discountRepo->store($discountDto);
        $this->applyProductDiscount->execute($discount);
    }
}
