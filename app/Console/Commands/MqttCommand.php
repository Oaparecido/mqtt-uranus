<?php

namespace App\Console\Commands;

use App\Models\Mqtt;
use App\Services\MqttService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MqttCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mqtt:save-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to save all data from mqtt';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line(Carbon::now() . ' --------------------------- ');
        $this->line(Carbon::now() . ' >>>> - Start command - <<<< ');
        $this->line(Carbon::now() . ' --------------------------- ');

        $request = new Request();

        $request->merge([
            'temperature' => (new MqttService())->getTemperature(),
            'pluviometter' => (new MqttService())->getPluviometter(),
            'moisture' => (new MqttService())->getMoisture(),
            'wind_velocity' => (new MqttService())->getVelocity(),
            'wind_direction' => (new MqttService())->getDirection(),
        ]);

        try {
            DB::transaction(function () use ($request) {
                DB::table('mqtt')->insert([
                    'temperature' => $request->get('temperature'),
                    'pluviometter' => $request->get('pluviometter'),
                    'moisture' => $request->get('moisture'),
                    'wind_velocity' => $request->get('wind_velocity'),
                    'wind_direction' => $request->get('wind_direction'),
                ]);

                $mqtt = DB::table('mqtt')
                    ->select('id', 'temperature', 'pluviometter', 'moisture', 'wind_velocity', 'wind_direction')
                    ->orderBy('id', 'desc')
                    ->first();

                $this->info(Carbon::now() . ' >>>> Success!');
                $this->info(Carbon::now() . ' >>>> ID: ' . $mqtt->id);
                $this->info(Carbon::now() . ' >>>> Temperature: ' . $mqtt->temperature);
                $this->info(Carbon::now() . ' >>>> Pluviometter: ' . $mqtt->pluviometter);
                $this->info(Carbon::now() . ' >>>> Moisture: ' . $mqtt->moisture);
                $this->info(Carbon::now() . ' >>>> Wind_velocity: ' . $mqtt->wind_velocity);
                $this->info(Carbon::now() . ' >>>> Wind_direction: ' . $mqtt->wind_direction);
            });
        } catch (\Exception $e) {
            $this->error(Carbon::now() . ' >>>> Error occurred <<<< ');
            $this->error(Carbon::now() . ' >>>> Message: ' . $e->getMessage());
            $this->error(Carbon::now() . ' >>>> Code: ' . $e->getCode());
        }

        $this->line(Carbon::now() . ' ---------------------------');
        $this->line(Carbon::now() . ' >>>> - End command - <<<< ');
        $this->line(Carbon::now() . ' ---------------------------');
    }
}
