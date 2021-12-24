<?php

use Illuminate\Database\Migrations\Migration;
use Xproduct\Infrastructure\Models\Product;

class BuildProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $products = [];
        $products[] = [
            "sku" => "000001",
            "name" => "BV Lean leather ankle boots",
            "category" => 1, # boots
            "price" => 89000
        ];
        $products[] = [
            "sku" => "000002",
            "name" => "BV Lean leather ankle boots",
            "category" => 1, # boots
            "price" => 99000
        ];
        $products[] = [
            "sku" => "000003",
            "name" => "Ashlington leather ankle boots",
            "category" => 1, # boots
            "price" => 71000
        ];
        $products[] = [
            "sku" => "000004",
            "name" => "Naima embellished suede sandals",
            "category" => 3, # sandals
            "price" => 79500
        ];
        $products[] = [
            "sku" => "000005",
            "name" => "Nathane leather sneakers",
            "category" => 2, # sneakers
            "price" => 59000
        ];

        Product::insert($products);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
