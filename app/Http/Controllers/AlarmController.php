<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlarmController extends Controller
{
    public function getAlarm()
{
    $motorConveyor = DB::table('motor_conveyor')
        ->select('id', 'value', DB::raw('"motor_conveyor" as source'), 'created_at')
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->get();

    $armRobot = DB::table('arm_robot')
        ->select('id', 'value', DB::raw('"arm_robot" as source'), 'created_at')
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->get();

    $roll = DB::table('roll')
        ->select('id', 'value', DB::raw('"roll" as source'), 'created_at')
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->get();

    $palletDispenser = DB::table('pallet_dispenser')
        ->select('id', 'value', DB::raw('"pallet_dispenser" as source'), 'created_at')
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->get();

    $safetyConveyor = DB::table('safety_conveyor')
        ->select('id', 'value', DB::raw('"safety_conveyor" as source'), 'created_at')
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->get();

    $conveyorDetailMotor1 = DB::table('motor_conveyor_detail_motor1')
        ->select('id', 'vibration', 'temperature', 'speed', 'arus', DB::raw('"motor_conveyor_detail_motor1" as source'), 'created_at')
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->get();

    $conveyorDetailMotor2 = DB::table('motor_conveyor_detail_motor2')
        ->select('id', 'vibration', 'temperature', 'speed', 'arus', DB::raw('"motor_conveyor_detail_motor2" as source'), 'created_at')
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->get();

    $conveyorDetailMotor3 = DB::table('motor_conveyor_detail_motor3')
        ->select('id', 'vibration', 'temperature', 'speed', 'arus', DB::raw('"motor_conveyor_detail_motor3" as source'), 'created_at')
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->get();

    $conveyorDetailMotor4 = DB::table('motor_conveyor_detail_motor4')
        ->select('id', 'vibration', 'temperature', 'speed', 'arus', DB::raw('"motor_conveyor_detail_motor4" as source'), 'created_at')
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->get();

    $armrobotMotor1 = DB::table('arm_robot_detail_motor1')
        ->select('id', 'vibration', 'temperature', 'airpressure', DB::raw('"arm_robot_detail_motor1" as source'), 'created_at')
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->get();

    $palleteLeft = DB::table('pallete_dispenser_detail_left')
        ->select('id', 'airpressureforward', 'airpressureretract', 'rotationgrip', 'reedswitch', DB::raw('"pallete_dispenser_detail_left" as source'), 'created_at')
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->get();

    $palleteRight = DB::table('pallete_dispenser_detail_right')
        ->select('id', 'airpressureforward', 'airpressureretract', 'rotationgrip', 'reedswitch', DB::raw('"pallete_dispenser_detail_right" as source'), 'created_at')
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->get();

    $safetyConveyorDetail = DB::table('safety_conveyor_detail_lifting_area')
        ->select('id', 'lifting1', 'lifting2', 'palletdistance', 'elapsedtime', DB::raw('"safety_conveyor_detail_lifting_area" as source'), 'created_at')
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->get();

    $roll_detail = DB::table('roll_detail')
        ->select('id', 'rpm_motor', 'rpm_roll', 'presentase', 'getaran_hz', DB::raw('"roll_detail" as source'), 'created_at')
        ->orderBy('created_at', 'desc')
        ->limit(1)
        ->get();
    $alarms = collect();

    $sourceMapping = [
        "motor_conveyor" => "Motor Conveyor",
        "arm_robot" => "Arm Robot",
        "roll" => "Roll Conveyor",
        "pallet_dispenser" => "Pallet Dispenser",
        "safety_conveyor" => "Safety Conveyor",
        "motor_conveyor_detail_motor1" => "Motor 1 di Motor Conveyor",
        "motor_conveyor_detail_motor2" => "Motor 2 di Motor Conveyor",
        "motor_conveyor_detail_motor3" => "Motor 3 di Motor Conveyor",
        "motor_conveyor_detail_motor4" => "Motor 4 di Motor Conveyor",
        "arm_robot_detail_motor1" => "Arm Robot Fuji",
        "pallete_dispenser_detail_right" => "Pallet Dispenser Kanan",
        "pallete_dispenser_detail_left" => "Pallet Dispenser Kiri",
        "safety_conveyor_detail_lifting_area" => "Lifting Area di Safety Conveyor",
        "roll_detail" => 'Roll Detail'
    ];

    $parentMapping = [
        "motor_conveyor_detail_motor1" => "Motor Conveyor",
        "motor_conveyor_detail_motor2" => "Motor Conveyor",
        "motor_conveyor_detail_motor3" => "Motor Conveyor",
        "motor_conveyor_detail_motor4" => "Motor Conveyor",
        "arm_robot_detail_motor1" => "Arm Robot",
        "pallete_dispenser_detail_right" => "Pallet Dispenser",
        "pallete_dispenser_detail_left" => "Pallet Dispenser",
        "safety_conveyor_detail_lifting_area" => "Safety Conveyor",
        "roll_detail" => 'Roll'
    ];

    $checkForError = function ($item) use ($sourceMapping, $parentMapping) {
        $errors = [];
        if (isset($item->value) && $item->value < 70) {
            $errors[] = 'valuenya ' . $item->value;
        }
        if (isset($item->vibration) && $item->vibration < 70) {
            $errors[] = 'vibrasinya ' . $item->vibration . '%. Disarankan untuk memeriksa masalah pada bearing, ketidakseimbangan, atau penyumbatan mekanis, serta periksa kondisi rantai. Jika kering maka lakukan pelumasan oli';
        }
        if (isset($item->temperature) && $item->temperature > 75) {
            $errors[] = 'temperaturenya ' . $item->temperature . ' °C. Disarankan untuk check oli pada motor';
        }
        if (isset($item->speed) && $item->speed < 50) {
            $errors[] = 'kecepatannya ' . $item->speed . ' RPM. Disarankan untuk memeriksa kondisi mekanikal motor';
        }
        if (isset($item->arus) && $item->arus < 150) {
            $errors[] = 'arusnya ' . $item->arus . ' A. Disarankan untuk Check oleh tim listin ONM';
        }
        if (isset($item->airpressure) && $item->airpressure < 7) {
            $errors[] = 'Air Pressurenya ' . $item->airpressure . ' bar. Check air service unit/regulator plant air, connector dan compressor';
        }
        if (isset($item->airpressureforward) && $item->airpressureforward < 8) {
            $errors[] = 'Air Pressure Forwardnya ' . $item->airpressureforward . ' bar. Check air service unit/regulator plant air, connector dan compressor ';
        }
        if (isset($item->airpressureretract) && $item->airpressureretract < 8) {
            $errors[] = 'Air Pressure Retractnya ' . $item->airpressureretract . ' bar. Check air service unit/regulator plant air, connector dan compressor ';
        }
        if (isset($item->reedswitch) && $item->reedswitch < 1) {
            $errors[] = 'Reedswitchnya ' . $item->reedswitch . '. Check posisi reedswitch, apa ada indikasi perubahan posisi / check visual kondisi kabel';
        }
        if (isset($item->rotationgrip) && $item->rotationgrip < 0) {
            $errors[] = 'Rotation Gripnya ' . $item->rotationgrip . ' °. Check kondisi mekanikal, kondisi bearing pada rotation grip dan kondisi plant air. Apakah ada penyumbatan pada connector';
        }
        if (isset($item->palletdistance) && $item->palletdistance < 10) {
            $errors[] = 'Jarak Palletenya ' . $item->palletdistance . ' cm';
        }
        if (isset($item->rpm_motor) && $item->rpm_motor < 1500) {
            $errors[] = 'Kecepatan Motornya ' . $item->rpm_motor . ' RPM. Check pada mekanikal indikasi pada penyumbatan pada motor';
        }
        if (isset($item->getaran_hz) && $item->getaran_hz > 25) {
            $errors[] = 'Getarannya ' . $item->getaran_hz . ' HZ. Check kondisi mekanikal bearing, pada bagian baut ada yang kendor / check kondisi bearing';
        }
        if (isset($item->rpm_roll) && $item->rpm_roll < 100) {
            $errors[] = 'Kecepatan Rollnya ' . $item->rpm_roll . ' RPM. Check pada mekanikal indikasi pada penyumbatan pada roller';
        }
        if (isset($item->presentase) && $item->presentase < 70) {
            $errors[] = 'Presentasenya ' . $item->presentase . ' RPM';
        }
        if (isset($item->elapsedtime) && $item->elapsedtime < 70) {
            $errors[] = 'Elapsed Time nya ' . $item->elapsedtime . ' RPM';
        }

        if (!empty($errors)) {
            $originalSource = $item->source;
            $item->source = $sourceMapping[$item->source] ?? $item->source;
            $item->parent = $parentMapping[$originalSource] ?? null;
            $item->error = 'Terdapat gangguan pada ' . $item->source . ' dikarenakan ' . implode(', ', $errors) . '.';
            return $item;
        }

        return null;
    };

    $sources = [
        $motorConveyor,
        $armRobot,
        $roll,
        $palletDispenser,
        $safetyConveyor,
        $conveyorDetailMotor1,
        $conveyorDetailMotor2,
        $conveyorDetailMotor3,
        $conveyorDetailMotor4,
        $armrobotMotor1,
        $palleteLeft,
        $palleteRight,
        $safetyConveyorDetail,
        $roll_detail
    ];

    foreach ($sources as $source) {
        if ($source->isNotEmpty()) {
            $source->each(function ($item) use (&$alarms, $checkForError) {
                if ($errorItem = $checkForError($item)) {
                    $alarms->push($errorItem);
                }
            });
        }
    }

    if ($alarms->isEmpty()) {
        return response()->json(['message' => 'No alarms available'], 204);
    }

    return response()->json($alarms);
}

}
