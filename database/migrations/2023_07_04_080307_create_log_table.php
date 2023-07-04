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
        Schema::create('log', function (Blueprint $table) {
            $table->id();
            $table->string('nama_logger');
            $table->string('aktivitas');
            $table->dateTime('tgl_aktivitas');
            $table->string('data_terupdate');
            $table->string('device_name');
            $table->string('ip_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log');
    }
};
