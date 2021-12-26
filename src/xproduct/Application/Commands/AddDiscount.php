<?php

namespace Xproduct\Application\Commands;

use Xproduct\Libraries\Common\RequestInterface;
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
    public function execute(RequestInterface $request): void
    {
        $discountDto = new Discount();
        $discountDto->setItem($request->getAttr("item"));
        $discountDto->setType($request->getAttr("type"));
        $discountDto->setPercentage($request->getAttr("percentage"));

        $this->discountLib->execute($discountDto);
    }
}
