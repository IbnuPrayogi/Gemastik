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
        Schema::create('pelaporan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unique_id')->nullable();
            $table->foreign('unique_id')->references('id')->on('users')
            ->constrained('pelaporan')->onUpdate('cascade');
            $table->string('nama_proyek');
            $table->string('nama_lokasi');
            $table->string('nama_company');
            $table->string('longitude');
            $table->string('latitude');
            $table->dateTime('tgl_start');
            $table->dateTime('tgl_end');
            $table->dateTime('tgl_estimasi_perbaikan_lanjutan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelaporan');
    }
};
