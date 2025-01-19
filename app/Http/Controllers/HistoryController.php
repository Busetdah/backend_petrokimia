<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class historyController extends Controller
{
    public function gethistorys(Request $request)
    {
        $motorConveyor = DB::table('motor_conveyor')
            ->select('id', 'value', DB::raw('"motor_conveyor" as source'), 'created_at')
            ->where('value', '<', 40)
            ->get();

        $armRobot = DB::table('arm_robot')
            ->select('id', 'value', DB::raw('"arm_robot" as source'), 'created_at')
            ->where('value', '<', 40)
            ->get();

        $historys = $motorConveyor->merge($armRobot);

        foreach ($historys as $history) {
            $history->created_at = \Carbon\Carbon::parse($history->created_at)->toISOString();
        }

        return response()->json($historys->values()->all());
    }
}
