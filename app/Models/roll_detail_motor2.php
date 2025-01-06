<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roll_detail_motor2 extends Model
{
    protected $table = 'roll_detail_motor2';

    protected $fillable = [
        'temperature',
        'vibration',
        'speed',
        'airpressure'
    ];
}
