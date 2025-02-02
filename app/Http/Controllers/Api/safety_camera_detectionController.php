<?php

namespace App\Http\Controllers\Api;

use App\Models\safety_camera_detection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\safety_camera_detectionResource;

class safety_camera_detectionController extends Controller
{
    public function index()
{
    $safety_camera_detections = safety_camera_detection::get();
    if($safety_camera_detections->count() > 0)
    {
        return safety_camera_detectionResource::collection($safety_camera_detections);
    } else {
        return response()->json(['message' => 'No Record Available'], 200);
    }
}

}
