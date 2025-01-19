<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roll_detail extends Model
{
    protected $table = 'roll_detail';

    protected $fillable = [
        'rpm_motor',
        'rpm_roll',
        'presentase',
        'getaran_hz'
    ];
}
