<?php

namespace Xproduct\Libraries\Clients;

interface ProductClientInterface
{
    /**
     * To get Product by parameter type
     *
     * @param string $type
     * @param string $value
     *
     * @return array
     */
    public function getProductsByParameterType(string $type, string $value): array;
}
