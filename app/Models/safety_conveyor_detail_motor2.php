<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class safety_conveyor_detail_motor2 extends Model
{
    protected $table = 'safety_conveyor_detail_motor2';

    protected $fillable = [
        'temperature',
        'vibration',
        'speed',
        'airpressure'
    ];
}
