<?php

namespace Xproduct\Libraries\Clients;

use Xproduct\Infrastructure\Exceptions\NotFoundException;
use Xproduct\Libraries\Product\Repositories\CategoryRepositoryInterface;
use Xproduct\Libraries\Product\Repositories\ProductRepositoryInterface;

class ProductClient implements ProductClientInterface
{
    public const PARAMETER_TYPE_CATEGORY = "category";
    public const PARAMETER_TYPE_SKU = "sku";

    public function __construct(
        private ProductRepositoryInterface $productRepo,
        private CategoryRepositoryInterface $categorytRepo,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function getProductsByParameterType(string $type, string $value): array
    {
        switch ($type) {
            case self::PARAMETER_TYPE_CATEGORY:
                $categoryId = $this->categorytRepo->getCategoryIdByName($value);
                return $this->productRepo->getByCategory($categoryId);
            case self::PARAMETER_TYPE_SKU:
                return $this->productRepo->getBySku($value);
            default:
                throw new NotFoundException("this type {$type} is not found.");
        }
    }
}
