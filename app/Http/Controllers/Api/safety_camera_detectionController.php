<?php

namespace App\Http\Controllers\Api;

use App\Models\safety_camera_detection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\safety_camera_detectionResource;

class safety_camera_detectionController extends Controller
{
    public function index(Request $request)
{
    $request->validate([
        'limit' => 'sometimes|integer|min:1|max:100',
        'page' => 'sometimes|integer|min:1',
    ]);

    $perPage = $request->query('limit', 10);
    $page = $request->query('page', 1);

    $safety_camera_detections = safety_camera_detection::orderBy('created_at', 'desc')
        ->paginate($perPage, ['*'], 'page', $page);

    if ($safety_camera_detections->count() > 0) {
        return response()->json([
            'data' => safety_camera_detectionResource::collection($safety_camera_detections),
            'total' => $safety_camera_detections->total(),
            'current_page' => $safety_camera_detections->currentPage(),
            'total_pages' => $safety_camera_detections->lastPage(),
            'per_page' => $safety_camera_detections->perPage(),
        ]);
    } else {
        return response()->json(['message' => 'No Record Available'], 200);
    }
}
}
