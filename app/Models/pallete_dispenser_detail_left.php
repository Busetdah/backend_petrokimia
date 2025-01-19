<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pallete_dispenser_detail_left extends Model
{
    protected $table = 'pallete_dispenser_detail_left';

    protected $fillable = [
        'airpressureforward',
        'airpressureretract',
        'rotationgrip',
        'reedswitch'
    ];
}
