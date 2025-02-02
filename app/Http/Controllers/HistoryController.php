<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function getHistorys(Request $request)
    {
        $motorConveyor = DB::table('motor_conveyor')
            ->select('id', 'value', DB::raw('"motor_conveyor" as source'), 'created_at')
            ->where('value', '<', 40)
            ->get();

        $armRobot = DB::table('arm_robot')
            ->select('id', 'value', DB::raw('"arm_robot" as source'), 'created_at')
            ->where('value', '<', 40)
            ->get();

        $roll = DB::table('roll')
            ->select('id', 'value', DB::raw('"roll" as source'), 'created_at')
            ->where('value', '<', 40)
            ->get();

        $palletDispenser = DB::table('pallet_dispenser')
            ->select('id', 'value', DB::raw('"pallet_dispenser" as source'), 'created_at')
            ->where('value', '<', 40)
            ->get();

        $safetyConveyor = DB::table('safety_conveyor')
            ->select('id', 'value', DB::raw('"safety_conveyor" as source'), 'created_at')
            ->where('value', '<', 40)
            ->get();

        $conveyorDetailMotor1 = DB::table('motor_conveyor_detail_motor1')
            ->select('id', 'vibration', 'temperature', 'speed', 'arus', DB::raw('"motor_conveyor_detail_motor1" as source'), 'created_at')
            ->where('vibration', '<', 70)
            ->orWhere('temperature', '>', 60)
            ->orWhere('speed', '<', 50)
            ->orWhere('arus', '<', 150)
            ->get();

        $armrobotMotor1 = DB::table('arm_robot_detail_motor1')
            ->select('id', 'vibration', 'temperature', 'airpressure', DB::raw('"arm_robot_detail_motor1" as source'), 'created_at')
            ->where('vibration', '<', 70)
            ->orWhere('temperature', '>', 60)
            ->orWhere('airpressure', '<', 7)
            ->get();

        $palleteLeft = DB::table('pallete_dispenser_detail_left')
            ->select('id', 'airpressureforward', 'airpressureretract', 'rotationgrip', 'reedswitch', DB::raw('"pallete_dispenser_detail_left" as source'), 'created_at')
            ->where('airpressureforward', '<', 8)
            ->orWhere('airpressureretract', '<', 8)
            ->orWhere('rotationgrip', '<', 0)
            ->orWhere('reedswitch', '<', 1)
            ->get();

        $safetyConveyorDetail = DB::table('safety_conveyor_detail_lifting_area')
            ->select('id', 'lifting1', 'lifting2', 'palletdistance', 'elapsedtime', DB::raw('"safety_conveyor_detail_lifting_area" as source'), 'created_at')
            ->where('lifting1', '<', 10)
            ->orWhere('lifting2', '<', 10)
            ->orWhere('palletdistance', '<', 10)
            ->orWhere('elapsedtime', '<', 70)
            ->get();

        $roll_detail = DB::table('roll_detail')
            ->select('id', 'rpm_motor', 'rpm_roll', 'presentase', 'getaran_hz', DB::raw('"roll_detail" as source'), 'created_at')
            ->where('rpm_motor', '<', 1500)
            ->orWhere('rpm_roll', '<', 100)
            ->orWhere('presentase', '<', 70)
            ->orWhere('getaran_hz', '<', 10)
            ->get();

        $historys = collect([])
            ->merge($motorConveyor)
            ->merge($armRobot)
            ->merge($roll)
            ->merge($palletDispenser)
            ->merge($safetyConveyor)
            ->merge($conveyorDetailMotor1)
            ->merge($armrobotMotor1)
            ->merge($palleteLeft)
            ->merge($safetyConveyorDetail)
            ->merge($roll_detail);

        foreach ($historys as $history) {
            $history->created_at = \Carbon\Carbon::parse($history->created_at)->toISOString();
        }

        return response()->json($historys->values()->all());
    }
}
