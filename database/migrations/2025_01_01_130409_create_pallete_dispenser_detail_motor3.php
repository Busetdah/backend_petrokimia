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
        Schema::create('pallete_dispenser_detail_motor3', function (Blueprint $table) {
            $table->id();
            $table->float('temperature');
            $table->float('vibration');
            $table->float('speed');
            $table->float('airpressure');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pallete_dispenser_detail_motor3');
    }
};
