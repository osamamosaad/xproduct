<?php

namespace Xproduct\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Xproduct\Infrastructure\Repositories\{
    ProductRepository,
};

use Xproduct\Libraries\{
    Product\Repositories\ProductRepositoryInterface,
};

class RepositoriesProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
    }
}
