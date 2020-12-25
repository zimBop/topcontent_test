<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtisanWorkDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artisan_work_day', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('artisan_id');
            $table->foreign('artisan_id')
                ->references('id')
                ->on('artisans')
                ->onDelete('cascade');

            $table->unsignedBigInteger('work_day_id');
            $table->foreign('work_day_id')
                ->references('id')
                ->on('work_days')
                ->onDelete('cascade');

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
        Schema::dropIfExists('artisan_work_day');
    }
}
