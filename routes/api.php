<?php

use App\Http\Controllers\Api\motor_conveyorController;
use App\Http\Controllers\Api\pallet_dispenserController;
use App\Http\Controllers\Api\safety_conveyorController;
use App\Http\Controllers\Api\arm_robotController;
use App\Http\Controllers\Api\rollController;
use App\Http\Controllers\Api\safety_camera_detectionController;
use App\Http\Controllers\Api\roll_detail_motor1Controller;
use App\Http\Controllers\Api\roll_detail_motor2Controller;
use App\Http\Controllers\Api\roll_detail_motor3Controller;
use App\Http\Controllers\Api\roll_detail_motor4Controller;
use App\Http\Controllers\Api\motor_conveyor_detail_motor1Controller;
use App\Http\Controllers\Api\motor_conveyor_detail_motor2Controller;
use App\Http\Controllers\Api\motor_conveyor_detail_motor3Controller;
use App\Http\Controllers\Api\motor_conveyor_detail_motor4Controller;
use App\Http\Controllers\Api\safety_conveyor_detail_motor1Controller;
use App\Http\Controllers\Api\safety_conveyor_detail_motor2Controller;
use App\Http\Controllers\Api\safety_conveyor_detail_motor3Controller;
use App\Http\Controllers\Api\safety_conveyor_detail_motor4Controller;
use App\Http\Controllers\Api\pallete_dispenser_detail_motor1Controller;
use App\Http\Controllers\Api\pallete_dispenser_detail_motor2Controller;
use App\Http\Controllers\Api\pallete_dispenser_detail_motor3Controller;
use App\Http\Controllers\Api\pallete_dispenser_detail_motor4Controller;
use App\Http\Controllers\Api\arm_robot_detail_motor1Controller;
use App\Http\Controllers\Api\arm_robot_detail_motor2Controller;
use App\Http\Controllers\Api\arm_robot_detail_motor3Controller;
use App\Http\Controllers\Api\arm_robot_detail_motor4Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RestrictToFrontend;

// Route::middleware(RestrictToFrontend::class)->group(function () {
    Route::apiResource('motor_conveyor', motor_conveyorController::class);
    Route::apiResource('pallet_dispenser', pallet_dispenserController::class);
    Route::apiResource('safety_conveyor', safety_conveyorController::class);
    Route::apiResource('arm_robot', arm_robotController::class);
    Route::apiResource('roll', rollController::class);
    Route::apiResource('safety_camera_detection', safety_camera_detectionController::class);
    Route::apiResource('roll_detail_motor1', roll_detail_motor1Controller::class);
    Route::apiResource('roll_detail_motor2', roll_detail_motor2Controller::class);
    Route::apiResource('roll_detail_motor3', roll_detail_motor3Controller::class);
    Route::apiResource('roll_detail_motor4', roll_detail_motor4Controller::class);
    Route::apiResource('motor_conveyor_detail_motor1', motor_conveyor_detail_motor1Controller::class);
    Route::apiResource('motor_conveyor_detail_motor2', motor_conveyor_detail_motor2Controller::class);
    Route::apiResource('motor_conveyor_detail_motor3', motor_conveyor_detail_motor3Controller::class);
    Route::apiResource('motor_conveyor_detail_motor4', motor_conveyor_detail_motor4Controller::class);
    Route::apiResource('safety_conveyor_detail_motor1', safety_conveyor_detail_motor1Controller::class);
    Route::apiResource('safety_conveyor_detail_motor2', safety_conveyor_detail_motor2Controller::class);
    Route::apiResource('safety_conveyor_detail_motor3', safety_conveyor_detail_motor3Controller::class);
    Route::apiResource('safety_conveyor_detail_motor4', safety_conveyor_detail_motor4Controller::class);
    Route::apiResource('pallete_dispenser_detail_motor1', pallete_dispenser_detail_motor1Controller::class);
    Route::apiResource('pallete_dispenser_detail_motor2', pallete_dispenser_detail_motor2Controller::class);
    Route::apiResource('pallete_dispenser_detail_motor3', pallete_dispenser_detail_motor3Controller::class);
    Route::apiResource('pallete_dispenser_detail_motor4', pallete_dispenser_detail_motor4Controller::class);
    Route::apiResource('arm_robot_detail_motor1', arm_robot_detail_motor1Controller::class);
    Route::apiResource('arm_robot_detail_motor2', arm_robot_detail_motor2Controller::class);
    Route::apiResource('arm_robot_detail_motor3', arm_robot_detail_motor3Controller::class);
    Route::apiResource('arm_robot_detail_motor4', arm_robot_detail_motor4Controller::class);
// });

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
