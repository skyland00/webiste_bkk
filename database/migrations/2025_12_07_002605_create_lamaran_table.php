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
        Schema::create('lamaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelamar_id');
            $table->unsignedBigInteger('lowongan_id');
            $table->string('cv');
            $table->text('cover_letter')->nullable();
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->text('catatan_perusahaan')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('pelamar_id')->references('id')->on('pelamar')->onDelete('cascade');
            $table->foreign('lowongan_id')->references('id')->on('lowongan')->onDelete('cascade');

            // Unique constraint: 1 pelamar hanya bisa melamar 1x per lowongan
            $table->unique(['pelamar_id', 'lowongan_id'], 'unique_application');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamaran');
    }
};
