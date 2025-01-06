<?php

namespace App\Http\Controllers\Api;

use App\Models\motor_conveyor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\motor_conveyorResource;

class motor_conveyorController extends Controller
{
    public function index()
    {
        $motor_conveyors = motor_conveyor::latest('created_at')->first();
        if (!$motor_conveyors) {
            return response()->json([
                'data' => ['value' => '00.0']
            ], 200);
        }

        // Jika data ada, gunakan resource untuk menampilkan data
        return new motor_conveyorResource($motor_conveyors);
    }
}
