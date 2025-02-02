<?php

namespace App\Http\Controllers\Api;

use App\Models\motor_conveyor_detail_motor2;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\motor_conveyor_detail_motor2Resource;

class motor_conveyor_detail_motor2Controller extends Controller
{
    public function index()
    {
{
    $motor_conveyor_details = motor_conveyor_detail_motor2::latest('created_at')->take(8)->get();

    if ($motor_conveyor_details->isEmpty()) {
        return response()->json([
            'data' => [
                ['temperature' => '00.0',
                       'vibration' => '00.0',
                       'speed' => '00.0',
                       'arus' => '00.0'
                       ]
            ]
        ], 200);
    }

    // Ambil hanya ID dari 10 data terakhir
    $ids = $motor_conveyor_details->pluck('id');

    return response()->json([
        'data' => $motor_conveyor_details // Kirim seluruh koleksi atau properti tertentu
    ], 200);
}

    }
}
