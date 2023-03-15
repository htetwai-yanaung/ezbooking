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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('room_number');
            $table->foreignId('room_type_id');
            $table->integer('price');
            $table->integer('usd');
            $table->integer('discount')->nullable();
            $table->string('beds');
            $table->integer('bed_count');
            $table->string('cover_photo');
            $table->text('description');
            $table->string('status', 30);
            $table->string('images');
            $table->string('services');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
