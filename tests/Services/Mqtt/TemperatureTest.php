<?php

use App\Services\MqttService;

$mqtt = new MqttService();

test('Temperature', function () {
    $mqtt = new MqttService();
    $temperature = $mqtt->getTemperature();
    expect($temperature)->toBeString();
});

test('Moisture', function () {
    $mqtt = new MqttService();
    $moisture = $mqtt->getMoisture();
    expect($moisture)->toBeString();
});

test('Pluviometter', function () {
    $mqtt = new MqttService();
    $pluviometter = $mqtt->getPluviometter();
    expect($pluviometter)->toBeString();
});

test('Direction', function () {
    $mqtt = new MqttService();
    $direction = $mqtt->getDirection();
    expect($direction)->toBeString();
});

test('Velocity', function () {
    $mqtt = new MqttService();
    $velocity = $mqtt->getVelocity();
    expect($velocity)->toBeString();
});
