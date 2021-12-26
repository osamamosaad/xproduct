<?php

namespace Xproduct\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Xproduct\Infrastructure\Repositories\{
    CategoryRepository,
    DiscountRepository,
    ProductDiscountRepository,
    ProductRepository,
};

use Xproduct\Libraries\{
    Discount\Repositories\DiscountRepositoryInterface,
    Discount\Repositories\ProductDiscountRepositoryInterface,
    Product\Repositories\ProductRepositoryInterface,
};
use Xproduct\Libraries\Product\Repositories\CategoryRepositoryInterface;

class RepositoriesProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->singleton(
            DiscountRepositoryInterface::class,
            DiscountRepository::class
        );

        $this->app->singleton(
            ProductDiscountRepositoryInterface::class,
            ProductDiscountRepository::class
        );

        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
    }
}
