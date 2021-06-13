<?php

use App\Services\MqttService;

$mqtt = new MqttService();

test('Temperature', function () use ($mqtt) {
    $temperature = $mqtt->getTemperature();
    expect($temperature)->toBeString();
});

test('Moisture', function () use ($mqtt) {
    $moisture = $mqtt->getMoisture();
    expect($moisture)->toBeString();
});

test('Pluviometter', function () use ($mqtt) {
    $pluviometter = $mqtt->getPluviometter();
    expect($pluviometter)->toBeString();
});

test('Direction', function () use ($mqtt) {
    $direction = $mqtt->getDirection();
    expect($direction)->toBeString();
});

test('Velocity', function () use ($mqtt) {
    $velocity = $mqtt->getVelocity();
    expect($velocity)->toBeString();
});
