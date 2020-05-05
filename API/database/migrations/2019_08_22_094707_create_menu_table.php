<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('lang',2);
            $table->unsignedSmallInteger('lang_id');
            $table->string('title', 255);
            $table->boolean('main')->default(0);
            $table->unsignedInteger('page_id')->index()->nullable();
            $table->smallInteger('parent_id')->index()->nullable();
            $table->unsignedTinyInteger('hidden')->default(0)->index();
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
        Schema::dropIfExists('menu');
    }
}
