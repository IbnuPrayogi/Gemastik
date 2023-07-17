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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_roles')->nullable()->default(88);
            $table->foreign('id_roles')->references('id')->on('roles')
            ->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_company')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image_users')->nullable();
            $table->string('rekening')->nullable();
            $table->string('alamat')->nullable();
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
