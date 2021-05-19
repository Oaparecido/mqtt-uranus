<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MqttSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mqtt')->insert(
            [
                'temperature' => (string) rand('10', '40'),
                'moisture' => (string) rand('30', '90'),
                'pluviometter' => (string) rand('0', '50'),
                'wind_direction' => (string) rand('0', '360'),
                'wind_velocity' => (string) rand('0', '100')
            ]
        );
    }
}
