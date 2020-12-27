<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->char('lang',2);
            $table->unsignedInteger('lang_id');
            $table->string('url',255)->nullable();
            $table->integer('product_id')->nullable();
            $table->string('image');
            $table->string('title',255);
            $table->text('desc')->nullable();
            $table->unsignedSmallInteger('sort')->default(1)->index();
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
        Schema::dropIfExists('banners');
    }
}
