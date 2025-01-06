<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pallete_dispenser_detail_motor1 extends Model
{
    protected $table = 'pallete_dispenser_detail_motor1';

    protected $fillable = [
        'temperature',
        'vibration',
        'speed',
        'airpressure'
    ];
}
