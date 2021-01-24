<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_translates', function (Blueprint $table) {
            $table->unsignedInteger('item_id');
            $table->string('module_name', 60);
            $table->tinyInteger('locale_id');
            $table->string('slug', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('sub_title', 255)->nullable();
            $table->text('description');
            $table->text('meta_description');
            $table->longText('text');
            $table->primary(['item_id', 'module_name', 'locale_id']);
            $table->unique(['module_name', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_translates');
    }
}
