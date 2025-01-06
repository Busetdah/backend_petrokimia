<?php

namespace App\Http\Controllers\Api;

use App\Models\pallete_dispenser_detail_motor4;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\pallete_dispenser_detail_motor4Resource;

class pallete_dispenser_detail_motor4Controller extends Controller
{
    public function index()
    {
{
    $pallete_dispenser_details = pallete_dispenser_detail_motor4::latest('created_at')->take(8)->get();

    if ($pallete_dispenser_details->isEmpty()) {
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
    $ids = $pallete_dispenser_details->pluck('id');

    return response()->json([
        'data' => $pallete_dispenser_details // Kirim seluruh koleksi atau properti tertentu
    ], 200);
}

    }
}
