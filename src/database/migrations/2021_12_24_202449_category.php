<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            'CREATE TABLE `category` (
                `id` INT NOT NULL AUTO_INCREMENT ,
                `name` VARCHAR(25) NOT NULL ,
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
        DB::statement('DROP TABLE `category`');
    }
}
