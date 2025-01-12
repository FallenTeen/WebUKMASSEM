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
        Schema::create('tb_proker', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->enum('proker',['fisma','ave','aos','mistik','penpro','redcarpet','ldoa','lain']);
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->string('gambardesk')->nullable();
            $table->enum('kategori', ['primer', 'sekunder'])->default('sekunder');
            $table->json('tags')->nullable();
            $table->enum('tipe', ['proker', 'kegiatan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_proker');
    }
};
