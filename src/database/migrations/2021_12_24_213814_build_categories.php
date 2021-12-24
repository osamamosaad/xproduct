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
                ["name" => "boots"],
                ["name" => "sneakers"],
                ["name" => "sandals"],
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
