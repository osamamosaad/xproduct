<?php

namespace Xproduct\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Xproduct\Libraries\Clients\{ProductClient, ProductClientInterface};

class ClientsProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            ProductClientInterface::class,
            ProductClient::class
        );
    }
}
