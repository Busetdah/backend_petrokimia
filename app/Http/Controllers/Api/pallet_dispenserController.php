<?php

namespace App\Http\Controllers\Api;

use App\Models\pallet_dispenser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\pallet_dispenserResource;

class pallet_dispenserController extends Controller
{
    public function index()
    {
    $pallet_dispensers = pallet_dispenser::latest('created_at')->first();
    if (!$pallet_dispensers) {
        return response()->json([
            'data' => ['value' => '00.0']
        ], 200);
    }

    // Jika data ada, gunakan resource untuk menampilkan data
    return new pallet_dispenserResource($pallet_dispensers);
    }
}
