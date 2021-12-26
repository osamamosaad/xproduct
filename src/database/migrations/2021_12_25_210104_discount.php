<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Discount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE TABLE `discount` (
                `id` int NOT NULL AUTO_INCREMENT,
                `type` enum('category','sku') COLLATE utf8mb4_general_ci NOT NULL,
                `item` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
                `percentage` tinyint NOT NULL,
                `created_at` datetime NOT NULL,
                `updated_at` datetime NOT NULL,
                KEY `discount_ix_type_item` (`type`,`item`),
            PRIMARY KEY (`id`)) ENGINE=InnoDB;"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP TABLE `discount`');
    }
}
