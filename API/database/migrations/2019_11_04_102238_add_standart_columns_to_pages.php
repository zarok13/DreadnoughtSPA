<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStandartColumnsToPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->char('lang',2)->after('id');
            $table->unsignedSmallInteger('lang_id')->after('lang');
            $table->unsignedSmallInteger('sort')->after('hidden')->default(1)->index();
            $table->unique(['lang','lang_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('lang');
            $table->dropColumn('lang_id');
            $table->dropColumn('sort');
        });
    }
}
