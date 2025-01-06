<?php

namespace App\Http\Controllers\Api;

use App\Models\arm_robot;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\arm_robotResource;

class arm_robotController extends Controller
{
    public function index()
    {
        $arm_robot = arm_robot::latest('created_at')->first();
        if (!$arm_robot) {
            return response()->json([
                'data' => ['value' => '00.0']
            ], 200);
        }

        // Jika data ada, gunakan resource untuk menampilkan data
        return new arm_robotResource($arm_robot);
    }
}
