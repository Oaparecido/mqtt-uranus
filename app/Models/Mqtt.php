<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mqtt extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table = 'mqtt';

    public $timestamps = false;

    protected $fillable = ['temperature', 'moisture', 'pluviometter', 'wind_direction', 'wind_velocity'];
}
