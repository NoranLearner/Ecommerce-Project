<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_translations', function (Blueprint $table) {
            // The id method is an alias of the bigIncrements method.
            $table->id();
            // $table->increments('id');
            // $table->integer('setting_id')->unsigned();
            $table->bigInteger('setting_id')->unsigned();
            $table->string('locale');
            $table->longText('value')->nullable();
            $table->unique(['setting_id', 'locale']);
            // For Relationship
            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
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
        Schema::dropIfExists('setting_translations');
    }
}
