<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileStoreRefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_store_refs', function (Blueprint $table) {
            $table->increments('id');
            $table->char('lang', 2);
            $table->unsignedBigInteger('file_id');
            $table->integer('reference_id');
            $table->unsignedTinyInteger('reference_type');
            $table->smallInteger('sort')->default(1)->index();
            $table->boolean('pin')->default(0);
            $table->unique(['lang', 'file_id', 'reference_id', 'reference_type']);
            $table->foreign('file_id')->references('id')->on('file_store')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_store_refs');
    }
}
