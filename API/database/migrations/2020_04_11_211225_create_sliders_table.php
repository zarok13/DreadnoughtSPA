<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->char('lang',2);
            $table->unsignedInteger('lang_id');
            $table->string('title',255);
            $table->string('sub_title',255)->nullable();
            $table->text('desc')->nullable();
            $table->string('src')->nullable();
            $table->string('url')->nullable();
            $table->unsignedTinyInteger('position')->default(1)->index();
            $table->unsignedTinyInteger('visible')->default(1)->index();
            $table->unsignedSmallInteger('sort')->default(1)->index();
            $table->unique(['lang','lang_id']);
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
        Schema::dropIfExists('sliders');
    }
}
