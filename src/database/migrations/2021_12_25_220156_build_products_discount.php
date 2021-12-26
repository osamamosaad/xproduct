<?php

use Illuminate\Database\Migrations\Migration;
use Xproduct\Application\Commands\AddDiscount;

class BuildProductsDiscount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $addDiscountCommand = app(AddDiscount::class);
        $data = [];
        $data[] = [
            "type" => "category",
            "item" => "boots",
            "percentage" => 30,
        ];

        $data[] = [
            "type" => "sku",
            "item" => "000003",
            "percentage" => 5,
        ];

        foreach ($data as $discount) {
            $addDiscountCommand->execute($discount);
        }
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
