<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('arm_robot_detail_motor1', function (Blueprint $table) {
            $table->id();
            $table->float('temperature');
            $table->float('vibration');
            $table->float('airpressure');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arm_robot_detail_motor1');
    }
};
