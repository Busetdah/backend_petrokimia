<?php

use App\Http\Controllers\Api\motor_conveyorController;
use App\Http\Controllers\Api\pallet_dispenserController;
use App\Http\Controllers\Api\safety_conveyorController;
use App\Http\Controllers\Api\arm_robotController;
use App\Http\Controllers\Api\rollController;
use App\Http\Controllers\Api\safety_camera_detectionController;
use App\Http\Controllers\Api\roll_detailController;
use App\Http\Controllers\Api\motor_conveyor_detail_motor1Controller;
use App\Http\Controllers\Api\motor_conveyor_detail_motor2Controller;
use App\Http\Controllers\Api\motor_conveyor_detail_motor3Controller;
use App\Http\Controllers\Api\motor_conveyor_detail_motor4Controller;
use App\Http\Controllers\Api\safety_conveyor_detail_lifting_areaController;
use App\Http\Controllers\Api\pallete_dispenser_detail_leftController;
use App\Http\Controllers\Api\pallete_dispenser_detail_rightController;
use App\Http\Controllers\Api\arm_robot_detail_motor1Controller;
use App\Http\Controllers\Api\arm_robot_detail_motor2Controller;
use App\Http\Controllers\Api\arm_robot_detail_motor3Controller;
use App\Http\Controllers\Api\arm_robot_detail_motor4Controller;
use App\Http\Controllers\AlarmController;
use App\Http\Controllers\HistoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RestrictToFrontend;

// Route::middleware(RestrictToFrontend::class)->group(function () {
    Route::get('alarms', [AlarmController::class, 'getAlarm']);
    Route::get('historys', [HistoryController::class, 'getHistorys']);
    Route::apiResource('motor_conveyor', motor_conveyorController::class);
    Route::apiResource('pallet_dispenser', pallet_dispenserController::class);
    Route::apiResource('safety_conveyor', safety_conveyorController::class);
    Route::apiResource('arm_robot', arm_robotController::class);
    Route::apiResource('roll', rollController::class);
    Route::apiResource('safety_camera_detection', safety_camera_detectionController::class);
    Route::apiResource('roll_detail_roll', roll_detailController::class);
    Route::apiResource('motor_conveyor_detail_motor1', motor_conveyor_detail_motor1Controller::class);
    Route::apiResource('motor_conveyor_detail_motor2', motor_conveyor_detail_motor2Controller::class);
    Route::apiResource('motor_conveyor_detail_motor3', motor_conveyor_detail_motor3Controller::class);
    Route::apiResource('motor_conveyor_detail_motor4', motor_conveyor_detail_motor4Controller::class);
    Route::apiResource('safety_conveyor_detail_lifting', safety_conveyor_detail_lifting_areaController::class);
    Route::apiResource('pallete_dispenser_detail_left', pallete_dispenser_detail_leftController::class);
    Route::apiResource('pallete_dispenser_detail_right', pallete_dispenser_detail_rightController::class);
    Route::apiResource('arm_robot_detail_motor1', arm_robot_detail_motor1Controller::class);
    Route::apiResource('arm_robot_detail_motor2', arm_robot_detail_motor2Controller::class);
    Route::apiResource('arm_robot_detail_motor3', arm_robot_detail_motor3Controller::class);
    Route::apiResource('arm_robot_detail_motor4', arm_robot_detail_motor4Controller::class);
// });

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
