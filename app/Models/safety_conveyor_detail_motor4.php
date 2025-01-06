<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class safety_conveyor_detail_motor4 extends Model
{
    protected $table = 'safety_conveyor_detail_motor4';

    protected $fillable = [
        'temperature',
        'vibration',
        'speed',
        'airpressure'
    ];
}
