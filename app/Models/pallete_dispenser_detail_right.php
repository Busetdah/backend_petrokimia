<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pallete_dispenser_detail_right extends Model
{
    protected $table = 'pallete_dispenser_detail_right';

    protected $fillable = [
        'airpressureforward',
        'airpressureretract',
        'rotationgrip',
        'reedswitch'
    ];
}
