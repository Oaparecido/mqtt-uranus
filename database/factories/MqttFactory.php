<?php

namespace Database\Factories;

use App\Models\Mqtt;
use Illuminate\Database\Eloquent\Factories\Factory;

class MqttFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mqtt::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'temperature' => (string) $this->faker->numberBetween('10', '40'),
            'moisture' => (string) $this->faker->numberBetween('30', '90'),
            'pluviometter' => (string) $this->faker->numberBetween('0', '50'),
            'wind_direction' => (string) $this->faker->numberBetween('0', '360'),
            'wind_velocity' => (string) $this->faker->numberBetween('0', '100'),
            'created_at' => $this->faker->dateTimeBetween('-10 days')
        ];
    }
}
