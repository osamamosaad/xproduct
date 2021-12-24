<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ProductRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            'ALTER TABLE `product`
                ADD CONSTRAINT `product_fk_category_id` FOREIGN KEY (`category_id`)
                    REFERENCES `category`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE product DROP FOREIGN KEY product_fk_category_id`;`");
    }
}
