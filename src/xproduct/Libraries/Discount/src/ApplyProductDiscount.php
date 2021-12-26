<?php

namespace Xproduct\Libraries\Discount;

use Xproduct\Libraries\Clients\ProductClientInterface;
use Xproduct\Libraries\Discount\Dtos\Discount;
use Xproduct\Libraries\Discount\Repositories\ProductDiscountRepositoryInterface;
use Xproduct\Libraries\Product\Dtos\Product;

class ApplyProductDiscount
{

    /**
     * @param ProductRepositoryInterface $productRepo
     */
    public function __construct(
        private ProductClientInterface $productClient,
        private ProductDiscountRepositoryInterface $productDiscountRepo
    ) {
    }

    /**
     * Execute creating company
     *
     * @param Company $companyDto
     *
     * @return void
     */
    public function execute(Discount $discountDto)
    {
        $result = $this->productClient->getProductsByParameterType($discountDto->getType(), $discountDto->getItem());

        foreach ($result as $product) {
            $finalPrice = $this->applyDiscount($discountDto, $product);
            $this->productDiscountRepo->store($product->getId(), $discountDto->getId(), $finalPrice);
        }
    }

    /**
     * To calculate the final price after applying the discount
     *
     * @param Discount $discountDto
     * @param Product $productDto
     *
     * @return float
     */
    protected function applyDiscount(Discount $discountDto, Product $productDto): float
    {
        return $productDto->getPrice() * (1 - $discountDto->getPercentage() / 100);
    }
}
