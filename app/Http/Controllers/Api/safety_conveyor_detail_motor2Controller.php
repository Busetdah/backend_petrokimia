<?php

namespace App\Http\Controllers\Api;

use App\Models\safety_conveyor_detail_motor2;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\safety_conveyor_detail_motor2Resource;

class safety_conveyor_detail_motor2Controller extends Controller
{
    public function index()
    {
{
    $safety_conveyor_details = safety_conveyor_detail_motor2::latest('created_at')->take(8)->get();

    if ($safety_conveyor_details->isEmpty()) {
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
    $ids = $safety_conveyor_details->pluck('id');

    return response()->json([
        'data' => $safety_conveyor_details // Kirim seluruh koleksi atau properti tertentu
    ], 200);
}

    }
}
