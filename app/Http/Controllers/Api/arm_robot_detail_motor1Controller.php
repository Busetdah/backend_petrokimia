<?php

namespace App\Http\Controllers\Api;

use App\Models\arm_robot_detail_motor1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\arm_robot_detail_motor1Resource;

class arm_robot_detail_motor1Controller extends Controller
{
    public function index()
    {
{
    $arm_robot_details = arm_robot_detail_motor1::latest('created_at')->take(8)->get();

    if ($arm_robot_details->isEmpty()) {
        return response()->json([
            'data' => [
                ['temperature' => '00.0',
                       'vibration' => '00.0',
                       'speed' => '00.0',
                       'airpressure' => '00.0']
            ]
        ], 200);
    }

    // Ambil hanya ID dari 10 data terakhir
    $ids = $arm_robot_details->pluck('id');

    return response()->json([
        'data' => $arm_robot_details // Kirim seluruh koleksi atau properti tertentu
    ], 200);
}

    }
}
