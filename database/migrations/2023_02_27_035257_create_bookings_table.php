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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('room_type_id');
            $table->string('check_in', 10);
            $table->string('check_out', 10);
            $table->tinyInteger('adult');
            $table->tinyInteger('child')->nullable();
            $table->tinyInteger('wifi')->nullable();
            $table->string('ext_services')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
