<?php

namespace Xproduct\Infrastructure\Adapters;

/**
 * To Prisent the ServiceContainer inside the domain
 */
class ServiceContainer
{
    private $container;

    public function __construct()
    {
        $this->container = app(); // Laravel service container
    }

    /**
     * Resolve the given type from the container.
     *
     * @param  string|callable  $abstract
     *
     * @param  array  $parameters
     *
     * @return mixed
     */
    public function make($abstract, array $parameters = [])
    {
        return $this->container->make($abstract, $parameters);
    }
}
