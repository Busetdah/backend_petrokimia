<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class motor_conveyor_detail_motor3 extends Model
{
    protected $table = 'motor_conveyor_detail_motor3';

    protected $fillable = [
        'temperature',
        'vibration',
        'speed',
        'airpressure'
    ];
}
