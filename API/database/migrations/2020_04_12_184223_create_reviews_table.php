<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->char('lang',2);
            $table->unsignedInteger('lang_id');
            $table->string('name',255);
            $table->string('image');
            $table->text('review');
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
        Schema::dropIfExists('reviews');
    }
}
