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
            $table->integer('pinpoint_id');
            $table->string('nama_company');
            $table->string('nama_pemilik');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image_users')->nullable();
            $table->string('rekening');
            $table->string('alamat');
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
