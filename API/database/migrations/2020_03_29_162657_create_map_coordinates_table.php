<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapCoordinatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_coordinates', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('lat',255);
            $table->string('lng',255);
            $table->decimal('zoom');
            $table->tinyInteger('template_type');
            $table->unsignedInteger('page_id')->unique();
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
        Schema::dropIfExists('map_coordinates');
    }
}
