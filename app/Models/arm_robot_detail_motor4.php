<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class arm_robot_detail_motor4 extends Model
{
    protected $table = 'arm_robot_detail_motor4';

    protected $fillable = [
        'temperature',
        'vibration',
        'speed',
        'airpressure'
    ];
}
