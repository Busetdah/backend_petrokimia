<?php

namespace App\Http\Controllers\Api;

use App\Models\roll;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\rollResource;

class rollController extends Controller
{
    public function index()
    {
        $rolls = roll::latest('created_at')->first();
        if (!$rolls) {
            return response()->json([
                'data' => ['value' => '00.0']
            ], 200);
        }

        return new rollResource($rolls);
    }
}
