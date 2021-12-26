<?php

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('products',  ['uses' => 'ProductController@list']);
    $router->post('discounts',  ['uses' => 'DiscountController@create']);
});
