<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {

            $table->id();

            $table->bigInteger('attribute_id')->unsigned()->nullable();

            $table->bigInteger('product_id')->unsigned()->nullable();

            $table->string('price');

            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

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
        Schema::dropIfExists('options');
    }
}
