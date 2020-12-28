<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromWorkDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_days', function (Blueprint $table) {
            $table->dropColumn('start');
        });

        Schema::table('work_days', function (Blueprint $table) {
            $table->dropColumn('end');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('work_days', function (Blueprint $table) {
            $table->time('start')->default('09:00:00');
            $table->time('end')->default('18:00:00');
        });
    }
}
