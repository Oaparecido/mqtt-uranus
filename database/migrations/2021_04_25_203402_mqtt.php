<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mqtt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mqtt', function (Blueprint $table) {
            $table->id();
            $table->date('day');
            $table->double('temperature');
            $table->double('moisture');
            $table->double('wind_velocity');
            $table->integer('wind_direction');
            $table->timestamp('creation_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mqtt');
    }
}
