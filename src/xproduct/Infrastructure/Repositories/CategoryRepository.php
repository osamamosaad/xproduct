<?php

namespace Xproduct\Infrastructure\Repositories;

use Xproduct\Infrastructure\Exceptions\NotFoundException;
use Xproduct\Infrastructure\Models\Category as CategoryModel;
use Xproduct\Libraries\Product\Repositories\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function __construct(
        private CategoryModel $categoryModel
    ) {
    }

    public function getCategoryIdByName(string $name): int
    {
        $category = $this->categoryModel->where("name", $name)->first();

        if ($category) {
            return $category->id;
        }
        throw new NotFoundException("[{$name}] category Name is not found");
    }
}
