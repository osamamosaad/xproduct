<?php

namespace App\ApiSchema;

class ProductSchema extends SchemaBase
{
    /**
     * @inheritDoc
     */
    protected function prepare($data): array
    {
        return [
            "sku" => $data->getSku(),
            "name" => $data->getName(),
            "category" => $data->getCategory(),
            "price" => [
                "original" => $data->getPrice(),
                "final" => $data->getFinalPrice(),
                "discount_percentage" => $data->getDiscountPercentage(),
                "currency" => $data->getCurrency(),
            ]
        ];
    }
}
