<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            'CREATE TABLE `product` (
                `id` INT NOT NULL AUTO_INCREMENT ,
                `sku` VARCHAR(20) NOT NULL ,
                `name` VARCHAR(100) NOT NULL ,
                `category_id` INT NOT NULL ,
                `created_at` DATETIME NOT NULL ,
                `updated_at` DATETIME NOT NULL ,
            PRIMARY KEY (`id`)) ENGINE = InnoDB;'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP TABLE `product`');
    }
}
