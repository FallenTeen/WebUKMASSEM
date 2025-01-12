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
        Schema::create('tb_anggota', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->enum('role', ['admin', 'ketum', 'sekretaris', 'bendahara', 'kadiv', 'digman', 'rt']);
            $table->enum('status_anggota', ['ang_muda', 'ang_tetap', 'bpo', 'lainnya']);
            $table->enum('divisi', ['musik', 'tari', 'teater', 'foto', 'film']);
            $table->string('angkatan');
            $table->string('no_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_anggota');
    }
};
