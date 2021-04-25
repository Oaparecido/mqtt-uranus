<?php


namespace App\Services;


use PhpMqtt\Client\MqttClient;

class MqttService
{
    private string $host = 'broker.emqx.io';
    private int $port = 1883;
    private array $topics = [
        'temperature' => 'shintaro/2513/dht22/temperatura',
        'moisture' => 'shintaro/2513/dht22/humidade',
        'pluviometter' => 'shintaro/2513/pluviometter/value',
        'velocity' => 'shintaro/2513/vento/velocidade',
        'direction' => 'shintaro/2513/vento/direcao',
    ];
    private MqttClient $mqtt;
    private string $temperature;
    private string $moisture;
    private string $pluviometter;
    private string $velocity;
    private string $direction;

    /**
     * @throws \PhpMqtt\Client\Exceptions\ProtocolNotSupportedException
     * @throws \PhpMqtt\Client\Exceptions\ConfigurationInvalidException
     * @throws \PhpMqtt\Client\Exceptions\ConnectingToBrokerFailedException
     */
    public function __construct()
    {
        $this->mqtt = new MqttClient($this->host, $this->port);
        $this->mqtt->connect(null, true);
//        $this->subscribe();
    }

    public function getTemperature(): string
    {
        $this->mqtt->subscribe($this->topics['temperature'], function ($topic, $message) {
            $this->temperature = $message;
            $this->mqtt->interrupt();
        }, 0);
        $this->mqtt->loop(true);
        $this->mqtt->disconnect();

        return $this->temperature;
    }

    public function getMoisture(): string
    {
        $this->mqtt->subscribe($this->topics['moisture'], function ($topic, $message) {
            $this->moisture = $message;
            $this->mqtt->interrupt();
        }, 0);
        $this->mqtt->loop(true);
        $this->mqtt->disconnect();

        return $this->moisture;
    }

    public function getPluviometter(): string
    {
        $this->mqtt->subscribe($this->topics['pluviometter'], function ($topic, $message) {
            $this->pluviometter = $message;
            $this->mqtt->interrupt();
        }, 0);
        $this->mqtt->loop(true);
        $this->mqtt->disconnect();

        return $this->pluviometter;
    }

    public function getVelocity(): string
    {
        $this->mqtt->subscribe($this->topics['velocity'], function ($topic, $message) {
            $this->velocity = $message;
            $this->mqtt->interrupt();
        }, 0);
        $this->mqtt->loop(true);
        $this->mqtt->disconnect();

        return $this->velocity;
    }

    public function getDirection(): string
    {
        $this->mqtt->subscribe($this->topics['direction'], function ($topic, $message) {
            $this->direction = $message;
            $this->mqtt->interrupt();
        }, 0);
        $this->mqtt->loop(true);
        $this->mqtt->disconnect();

        return $this->direction;
    }
}
