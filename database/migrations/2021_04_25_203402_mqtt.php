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
            $table->string('temperature');
            $table->string('pluviometter');
            $table->string('moisture');
            $table->string('wind_velocity');
            $table->string('wind_direction');
            $table->timestamp('created_at');
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
