<?php

namespace Xproduct\Infrastructure\Repositories;

use Xproduct\Infrastructure\Models\ProductDiscount as ProductDiscountModel;
use Xproduct\Libraries\Discount\Repositories\ProductDiscountRepositoryInterface;

class ProductDiscountRepository implements ProductDiscountRepositoryInterface
{
    public function __construct(
        private ProductDiscountModel $productDiscountModel,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function store(int $productId, int $discountId, float $finalPrice): void
    {
        $productDiscountModel = $this->productDiscountModel->newInstance();
        $productDiscountModel->product_id = $productId;
        $productDiscountModel->discount_id = $discountId;
        $productDiscountModel->final_price = $finalPrice;
        $productDiscountModel->created_at = date_create();
        $productDiscountModel->updated_at = date_create();

        $productDiscountModel->save();
    }
}
