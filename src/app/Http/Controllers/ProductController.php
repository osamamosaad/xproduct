<?php

namespace App\Http\Controllers;

use App\ApiSchema\ProductSchema;
use Symfony\Component\HttpFoundation\Response;
use Xproduct\Application\Queries\GetProductsQuery;

class ProductController extends Controller
{
    /**
     * @api {GET}  /api/products list products
     *
     * @return void
     */
    public function list(GetProductsQuery $getProductsQuery)
    {
        $response = $getProductsQuery->get($this->getRequest());

        return (new ProductSchema($response))->response(Response::HTTP_OK);
    }
}
