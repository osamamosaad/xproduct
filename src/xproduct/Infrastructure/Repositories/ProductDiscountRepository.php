<?php

namespace Xproduct\Infrastructure\Repositories;

use Xproduct\Infrastructure\Models\ProductDiscount as ProductDiscountModel;
use Xproduct\Libraries\Discount\Repositories\ProductDiscountRepositoryInterface;

class ProductDiscountRepository implements ProductDiscountRepositoryInterface
{
    public function __construct(
        private ProductDiscountModel $invoiceModel,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function store(int $productId, int $discountId, float $finalPrice): void
    {
        $invoiceModel = $this->invoiceModel->newInstance();
        $invoiceModel->product_id = $productId;
        $invoiceModel->discount_id = $discountId;
        $invoiceModel->final_price = $finalPrice;
        $invoiceModel->created_at = date_create();
        $invoiceModel->updated_at = date_create();

        $invoiceModel->save();
    }
}
