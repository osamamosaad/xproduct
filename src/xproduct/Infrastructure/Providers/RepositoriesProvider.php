<?php

namespace Xproduct\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Xproduct\Infrastructure\Repositories\{
    CategoryRepository,
    ProductRepository,
};

use Xproduct\Libraries\{

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
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
    }
}
