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

        $Roll = DB::table('roll')
            ->select('id', 'value', DB::raw('"roll" as source'), 'created_at')
            ->orderBy('created_at', 'desc')
            ->limit(1)
            ->get();

        $pallet_dispenser = DB::table('pallet_dispenser')
            ->select('id', 'value', DB::raw('"pallet_dispenser" as source'), 'created_at')
            ->orderBy('created_at', 'desc')
            ->limit(1)
            ->get();

        $safety_conveyor = DB::table('safety_conveyor')
            ->select('id', 'value', DB::raw('"safety_conveyor" as source'), 'created_at')
            ->orderBy('created_at', 'desc')
            ->limit(1)
            ->get();

        $alarms = collect();

        if ($motorConveyor->isNotEmpty()) {
            $motorConveyor->each(function ($item) {
                $item->value = $item->value > 40 ? 0 : $item->value;
            });
            $alarms = $alarms->merge($motorConveyor);
        }

        if ($armRobot->isNotEmpty()) {
            $armRobot->each(function ($item) {
                $item->value = $item->value > 40 ? 0 : $item->value;
            });
            $alarms = $alarms->merge($armRobot);
        }

        if ($Roll->isNotEmpty()) {
            $Roll->each(function ($item) {
                $item->value = $item->value > 40 ? 0 : $item->value;
            });
            $alarms = $alarms->merge($Roll);
        }

        if ($pallet_dispenser->isNotEmpty()) {
            $pallet_dispenser->each(function ($item) {
                $item->value = $item->value > 40 ? 0 : $item->value;
            });
            $alarms = $alarms->merge($pallet_dispenser);
        }

        if ($safety_conveyor->isNotEmpty()) {
            $safety_conveyor->each(function ($item) {
                $item->value = $item->value > 40 ? 0 : $item->value;
            });
            $alarms = $alarms->merge($safety_conveyor);
        }

        if ($alarms->isEmpty()) {
            return response()->json(['message' => 'No alarms available'], 204);
        }

        return response()->json($alarms);
    }
}
