<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'categories', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->timestamps();
            }
        );

        Schema::create(
            'article_category', function (Blueprint $table) {
                $table->unsignedInteger('article_id');
                $table->unsignedInteger('category_id');
                $table->primary(['article_id', 'category_id']);
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('article_category');
    }
}
