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

    /**
     * @throws \PhpMqtt\Client\Exceptions\ProtocolNotSupportedException
     * @throws \PhpMqtt\Client\Exceptions\ConfigurationInvalidException
     * @throws \PhpMqtt\Client\Exceptions\ConnectingToBrokerFailedException
     */
    public function __construct()
    {
        $this->mqtt = new MqttClient($this->host, $this->port);
        $this->mqtt->interrupt();
        $this->mqtt->connect();
    }

    public function getTemperature()
    {
        $this->mqtt->subscribe($this->topics['temperature'], function ($topic, $message) {
            return $message;
        }, 0);

        $this->mqtt->loop(true);
        $this->mqtt->disconnect();
    }
}
