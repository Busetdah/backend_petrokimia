<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class safety_conveyor_detail_lifting_area extends Model
{
    protected $table = 'safety_conveyor_detail_lifting_area';

    protected $fillable = [
        'lifting1',
        'lifting2',
        'palletdistance',
        'elapsedtime'
    ];
}
