<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mqtt extends Model
{
    use HasFactory;

    protected string $connection = 'mysql';

    protected string $table = 'mqtt';

    protected array $fillable = ['temperature', 'moisture', 'pluviometter', 'wind_direction', 'wind_velocity'];
}
