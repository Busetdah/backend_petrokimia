<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roll_detail_motor4 extends Model
{
    protected $table = 'roll_detail_motor4';

    protected $fillable = [
        'temperature',
        'vibration',
        'speed',
        'airpressure'
    ];
}
