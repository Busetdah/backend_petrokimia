<?php

namespace App\Http\Controllers\Api;

use App\Models\pallete_dispenser_detail_right;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\pallete_dispenser_detail_rightResource;

class pallete_dispenser_detail_rightController extends Controller
{
    public function index()
    {
{
    $pallete_dispenser_details = pallete_dispenser_detail_right::latest('created_at')->take(8)->get();

    if ($pallete_dispenser_details->isEmpty()) {
        return response()->json([
            'data' => [
                ['airpressureforward' => '00',
                 'airpressureretract' => '00',
                 'rotationgrip' => '00',
                 'reedswitch' => '-']
            ]
        ], 200);
    }
    $ids = $pallete_dispenser_details->pluck('id');
    return response()->json([
        'data' => $pallete_dispenser_details
    ], 200);
}

    }
}
