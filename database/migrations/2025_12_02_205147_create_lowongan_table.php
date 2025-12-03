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
        Schema::create('lowongan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perusahaan_id')->constrained('perusahaan')->onDelete('cascade');
            $table->string('judul_lowongan');
            $table->text('deskripsi_pekerjaan');
            $table->text('kualifikasi');
            $table->string('bidang');
            $table->string('lokasi');
            $table->enum('tipe_pekerjaan', ['full-time', 'part-time', 'kontrak', 'magang']);
            $table->integer('gaji_min')->nullable();
            $table->integer('gaji_max')->nullable();
            $table->integer('jumlah_orang');
            $table->date('tanggal_buka');
            $table->date('tanggal_tutup');
            $table->enum('status', ['aktif', 'nonaktif', 'ditutup'])->default('aktif');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan');
    }
};
