<?php

test('Generate Factory', function () {
    \App\Models\Mqtt::factory()->count(10)->create();
    expect(true)->toBeTrue();
});
