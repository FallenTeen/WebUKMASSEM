<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_presensi_rapat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rapat_id')->constrained('tb_rapat')->onDelete('cascade');
            $table->foreignId('anggota_id')->constrained('tb_anggota')->onDelete('cascade');
            $table->enum('status_kehadiran', ['hadir', 'izin', 'alpa'])->default('alpa');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // untuk memastikan tidak ada duplikasi kehadiran:
            $table->unique(['rapat_id', 'anggota_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_presensi_rapat');
    }
};
