<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->default('0');
            $table->integer('category_id')->unsigned();
            $table->char('translation_lang', 10);
            $table->integer('translation_of')->unsigned();
            $table->char('name', 150);
            $table->char('slug', 150)->nullable();
            $table->char('photo', 150)->nullable();
            $table->tinyInteger('active')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categories');
    }
}
