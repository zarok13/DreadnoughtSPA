<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markers', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->char('lang',2);
            $table->unsignedSmallInteger('lang_id');
            $table->string('title',255);
            $table->string('desc')->nullable();
            $table->string('lat',255);
            $table->string('lng',255);
            $table->unsignedInteger('page_id');
            $table->unsignedSmallInteger('sort')->default(1)->index();
            $table->unique(['lang','lang_id']);
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('markers');
    }
}
