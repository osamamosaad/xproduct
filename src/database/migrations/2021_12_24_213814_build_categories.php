<?php

use Illuminate\Database\Migrations\Migration;
use Xproduct\Infrastructure\Models\Category;

class BuildCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {;
        Category::insert(
            [
                [
                    "name" => "boots",
                    "created_at" => date_create(),
                    "updated_at" => date_create(),
                ],
                [
                    "name" => "sneakers",
                    "created_at" => date_create(),
                    "updated_at" => date_create(),
                ],
                [
                    "name" => "sandals",
                    "created_at" => date_create(),
                    "updated_at" => date_create(),
                ],
            ]
        );
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
