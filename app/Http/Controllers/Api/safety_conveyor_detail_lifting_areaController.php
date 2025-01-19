<?php

namespace App\Http\Controllers\Api;

use App\Models\safety_conveyor_detail_lifting_area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\safety_conveyor_detail_lifting_areaResource;

class safety_conveyor_detail_lifting_areaController extends Controller
{
    public function index()
    {
{
    $safety_conveyor_detail_lifting_area_details = safety_conveyor_detail_lifting_area::latest('created_at')->take(8)->get();

    if ($safety_conveyor_detail_lifting_area_details->isEmpty()) {
        return response()->json([
            'data' => [
                ['lifting1' => '-',
                 'lifting2' => '-',
                 'palletdistance' => '00',
                 'elapsedtime' => '00']
            ]
        ], 200);
    }
    $ids = $safety_conveyor_detail_lifting_area_details->pluck('id');
    return response()->json([
        'data' => $safety_conveyor_detail_lifting_area_details
    ], 200);
}

    }
}
