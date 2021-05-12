<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ResponseHelper;
use Illuminate\Support\Facades\DB;

class MqttController extends Controller
{
    public function index()
    {
        $mqtt = DB::table('mqtt')
            ->orderBy('id', 'desc')
            ->first();

        $response = [
            'pluviometter' => (!empty($mqtt->pluviometter)) ? $mqtt->pluviometter : null,
            'temperature' => (!empty($mqtt->temperature)) ? $mqtt->temperature : null,
            'moisture' => (!empty($mqtt->moisture)) ? $mqtt->moisture : null,
            'wind' => [
                'velocity' => (!empty($mqtt->wind_velocity)) ? $mqtt->wind_velocity : null,
                'direction' => (!empty($mqtt->wind_direction)) ? $mqtt->wind_direction : null
            ],
        ];

        return ResponseHelper::success('mqtt:last.saved.data', $response, 200);
    }

    public function byDate($date)
    {
        $mqtt = DB::table('mqtt')
            ->orderBy('id', 'desc')
            ->whereDate('created_at', $date)
            ->first();

        if (!$mqtt)
            return ResponseHelper::exception('mqtt:not.found.by.date', [], 422);

        $response = [
            'pluviometter' => (!empty($mqtt->pluviometter)) ? $mqtt->pluviometter : null,
            'temperature' => (!empty($mqtt->temperature)) ? $mqtt->temperature : null,
            'moisture' => (!empty($mqtt->moisture)) ? $mqtt->moisture : null,
            'wind' => [
                'velocity' => (!empty($mqtt->wind_velocity)) ? $mqtt->wind_velocity : null,
                'direction' => (!empty($mqtt->wind_direction)) ? $mqtt->wind_direction : null
            ],
        ];

        return ResponseHelper::success('mqtt:last.saved.data.by.date', $response, 200);
    }
}
