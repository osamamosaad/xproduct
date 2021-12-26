<?php

namespace Xproduct\Infrastructure\Repositories;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Xproduct\Infrastructure\Models\Product as ProductModel;
use Xproduct\Libraries\Common\RequestInterface;
use Xproduct\Libraries\Product\Dtos\Product;
use Xproduct\Libraries\Product\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(
        private ProductModel $productModel
    ) {
    }

    /**
     * @inheritDoc
     */
    public function store(Product $productDto): void
    {
        // here stor product
    }

    public function getByFilter(RequestInterface $request): array
    {
        $queryBuilder = $this->productModel
            ->select(
                "product.id",
                "product.sku",
                "product.name",
                "product.price",
                "category.name as category_name",
                DB::raw("MAX(discount.percentage) as discount_percentage"),
                DB::raw("MIN(product_discount.final_price) as final")
            )
            ->join('category', 'product.category_id', '=', 'category.id')
            ->leftjoin('product_discount', 'product.id', '=', 'product_discount.product_id')
            ->leftjoin('discount', 'product_discount.discount_id', '=', 'discount.id')
            ->groupBy("product.id");

        if ($price = $request->getFilter("priceLessThan")) {
            $queryBuilder->where("price", "<=", $price);
        }

        if ($category = $request->getFilter("category")) {
            $queryBuilder->where("category.name", $category);
        }

        return $this->hydrateData($queryBuilder->get());
    }

    /**
     * @inheritDoc
     */
    public function getByCategory($categoryId): array
    {
        $data = $this->productModel
            ->select("product.*", "category.name as category_name")
            ->join('category', 'product.category_id', '=', 'category.id')
            ->where("category_id", $categoryId)->get();

        return $this->hydrateData($data);
    }

    /**
     * @inheritDoc
     */
    public function getBySku(string $sku): array
    {
        $data = $this->productModel
            ->select("product.*", "category.name as category_name")
            ->join('category', 'product.category_id', '=', 'category.id')
            ->where("sku", $sku)->get();

        return $this->hydrateData($data);
    }

    /**
     * Undocumented function
     *
     * @param array $data []ProductModel
     *
     * @return []Product
     */
    protected function hydrateData($data): array
    {
        $collection = [];
        foreach ($data as $product) {
            $product->discount_percentage = null;
            $collection[] = (new Product())
                ->setId($product->id)
                ->setSku($product->sku)
                ->setName($product->name)
                ->setCategory($product->category_name)
                ->setPrice($product->price)
                ->setFinalPrice(Arr::get($product, "final_price"))
                ->setDiscountPercentage(Arr::get($product, "discount_percentage"))
                ->setCurrency("EUR");
        }
        return $collection;
    }
}
