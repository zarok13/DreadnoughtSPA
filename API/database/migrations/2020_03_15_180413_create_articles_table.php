<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->char('lang',2);
            $table->unsignedSmallInteger('lang_id')->nullable();
            $table->string('slug',191);
            $table->string('title',255)->nullable();
            $table->string('image',255)->nullable();
            $table->string('sub_title',255)->nullable();
            $table->text('desc')->nullable();
            $table->longText('text')->nullable();
            $table->longText('meta_desc')->nullable();
            $table->boolean('pin')->nullable();
            $table->unsignedTinyInteger('visible')->index()->nullable();
            $table->unsignedTinyInteger('page_id')->index()->nullable();
            $table->integer('user_id');
            $table->unique(['lang','lang_id']);
            $table->unique(['lang','slug']);
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
        Schema::dropIfExists('articles');
    }
}
