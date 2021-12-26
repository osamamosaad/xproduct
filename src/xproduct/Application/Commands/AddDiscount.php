<?php

namespace Xproduct\Application\Commands;

use Xproduct\Libraries\Discount\Discount as DiscountLib;
use Xproduct\Libraries\Discount\Dtos\Discount;

class AddDiscount
{
    public function __construct(
        private DiscountLib $discountLib
    )
    {
    }

    /**
     * To handle company data that comes from presentation layer
     *
     * @param array $data
     *
     * @return void
     */
    public function execute(array $data): void
    {
        $discountDto = new Discount();
        $discountDto->setItem($data["item"]);
        $discountDto->setType($data["type"]);
        $discountDto->setPercentage($data["percentage"]);

        $this->discountLib->execute($discountDto);
    }
}
