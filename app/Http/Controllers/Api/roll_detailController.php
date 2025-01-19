<?php

namespace App\Http\Controllers\Api;

use App\Models\roll_detail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\roll_detailResource;

class roll_detailController extends Controller
{
    public function index()
    {
{
    $roll_details = roll_detail::latest('created_at')->take(8)->get();

    if ($roll_details->isEmpty()) {
        return response()->json([
            'data' => [
                ['rpm_motor' => '00',
                 'rpm_roll' => '00',
                 'presentase' => '00',
                 'getaran_hz' => '00']
            ]
        ], 200);
    }
    $ids = $roll_details->pluck('id');
    return response()->json([
        'data' => $roll_details
    ], 200);
}

    }
}
