<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ProductDiscount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            'CREATE TABLE `product_discount` (
                `id` int NOT NULL AUTO_INCREMENT,
                `discount_id` int NOT NULL,
                `product_id` int NOT NULL,
                `final_price` float NOT NULL,
                `created_at` datetime NOT NULL,
                `updated_at` datetime NOT NULL,
            PRIMARY KEY (`id`)) ENGINE=InnoDB;'
        );

        DB::statement(
            'ALTER TABLE `product_discount`
                ADD CONSTRAINT `product_discount_fk_discount_id`
                    FOREIGN KEY (`discount_id`) REFERENCES `discount` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
                ADD CONSTRAINT `product_discount_fk_product_id`
                    FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE product_discount DROP FOREIGN KEY `product_discount_fk_discount_id`;");
        DB::statement("ALTER TABLE product_discount DROP FOREIGN KEY `product_discount_fk_product_id`;");
        DB::statement('DROP TABLE `product_discount`');
    }
}
