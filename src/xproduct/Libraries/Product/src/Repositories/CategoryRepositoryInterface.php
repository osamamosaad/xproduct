<?php

namespace Xproduct\Libraries\Product\Repositories;

interface CategoryRepositoryInterface
{
    /**
     * @param string $name
     *
     * @return int
     */
    public function getCategoryIdByName(string $name): int;
}
