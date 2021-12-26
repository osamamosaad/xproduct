<?php

namespace Xproduct\Infrastructure\Repositories;

use Xproduct\Infrastructure\Models\Discount as DiscountModel;
use Xproduct\Libraries\Discount\Dtos\Discount;
use Xproduct\Libraries\Discount\Repositories\DiscountRepositoryInterface;

class DiscountRepository implements DiscountRepositoryInterface
{
    private $discountModel;

    public function __construct(DiscountModel $discountModel)
    {
        $this->discountModel = $discountModel;
    }

    /**
     * @inheritDoc
     */
    public function store(Discount $discountDto): Discount
    {
        $discountModel = $this->discountModel->newInstance();
        $discountModel->type = $discountDto->getType();
        $discountModel->item = $discountDto->getItem();
        $discountModel->percentage = $discountDto->getPercentage();
        $discountModel->created_at = date_create();
        $discountModel->updated_at = date_create();
        $discountModel->save();

        $discountDto->setId($discountModel->id);
        return $discountDto;
    }
}
