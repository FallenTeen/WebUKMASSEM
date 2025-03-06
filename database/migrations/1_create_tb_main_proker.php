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
        Schema::create('tb_main_proker', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); 
            $table->string('judul2');
            $table->text('deskripsi')->nullable(); 
            $table->string('gambar'); 
            $table->json('gambardesk')->nullable(); 
            $table->string('url')->nullable(); 
            $table->date('tanggal_mulai')->nullable(); 
            $table->date('tanggal_selesai')->nullable(); 
            $table->time('waktu_mulai')->nullable(); 
            $table->time('waktu_selesai')->nullable(); 
            $table->string('lokasi')->nullable();
            $table->text('alamat_lengkap')->nullable(); 
            $table->string('kategori')->nullable(); 
            $table->decimal('biaya_tiket', 10, 2)->nullable();
            $table->string('status')->default('upcoming');
            $table->text('kontak_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_main_proker');
    }
};
