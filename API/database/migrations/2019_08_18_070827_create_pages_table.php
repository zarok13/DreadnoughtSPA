<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug',191);
            $table->string('title',191);
            $table->text('desc')->nullable();
            $table->longText('text')->nullable();
            $table->TinyInteger('hidden')->default(0)->index();
            $table->unsignedSmallInteger('user_id');
            $table->unsignedTinyInteger('page_type_id')->index()->nullable();
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
        Schema::dropIfExists('pages');
    }
}
