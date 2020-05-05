<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelperFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helper_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->char('lang',2);
            $table->unsignedSmallInteger('lang_id');
            $table->string('keyword',191);
            $table->text('value')->nullable();
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('type')->index();
            $table->unique(['lang','lang_id']);
            $table->unique(['lang','keyword']);
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
        Schema::dropIfExists('helper_fields');
    }
}
