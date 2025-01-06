<?php

namespace App\Http\Controllers\Api;

use App\Models\safety_conveyor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\safety_conveyorResource;

class safety_conveyorController extends Controller
{
    public function index()
    {
    $safety_conveyors = safety_conveyor::latest('created_at')->first();
    if (!$safety_conveyors) {
        return response()->json([
            'data' => ['value' => '00.0']
        ], 200);
    }

    // Jika data ada, gunakan resource untuk menampilkan data
    return new safety_conveyorResource($safety_conveyors);
    }
}
