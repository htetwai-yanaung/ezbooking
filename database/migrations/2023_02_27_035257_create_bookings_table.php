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
            $table->string('room_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('role',['guest','user'])->default('guest');
            $table->string('email');
            $table->string('phone');
            $table->string('nationality');
            $table->string('address')->nullable();
            $table->string('nrc_number')->nullable();
            $table->string('passport')->nullable();
            $table->string('check_in', 10);
            $table->string('check_out', 10);
            $table->tinyInteger('total_days');
            $table->tinyInteger('adult');
            $table->tinyInteger('child')->nullable();
            $table->string('ext_services')->nullable();
            $table->integer('first_charge');
            $table->string('payment_type');
            $table->string('payment_ss');
            $table->enum('status',['0','1','2'])->default('1');
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
