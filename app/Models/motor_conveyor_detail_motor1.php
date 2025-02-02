<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class motor_conveyor_detail_motor1 extends Model
{
    protected $table = 'motor_conveyor_detail_motor1';

    protected $fillable = [
        'temperature',
        'vibration',
        'speed',
        'arus'
    ];
}
