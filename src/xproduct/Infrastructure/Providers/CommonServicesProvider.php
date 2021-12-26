<?php

namespace Xproduct\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Xproduct\Infrastructure\Adapters\Request;
use Xproduct\Libraries\Common\RequestInterface;

class CommonServicesProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            RequestInterface::class,
            Request::class
        );
    }
}
