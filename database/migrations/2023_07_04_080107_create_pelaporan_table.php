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
            ->constrained('pelaporan');
            $table->float('panjang_perbaikan')->nullable();
            $table->float('lebar_perbaikan')->nullable();
            $table->string('nama_lokasi')->nullable();
            $table->string('nama_company')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('foto')->nullable();
            $table->dateTime('tgl_start')->nullable();
            $table->dateTime('tgl_end')->nullable();
            $table->integer('status');
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
