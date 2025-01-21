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
        Schema::create('tb_proker', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->enum('proker', ['fisma', 'ave', 'aos', 'mistik', 'asleb', 'penpro', 'redcarpet', 'ldoa', 'lain']);
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->json('gambardesk')->nullable();
            $table->enum('kategori', ['primer', 'sekunder'])->default('sekunder');
            $table->json('tags')->nullable();
            $table->date('tanggal')->nullable();

            $table->unsignedBigInteger('main_proker_id');
            $table->foreign('main_proker_id')->references('id')->on('tb_main_proker')->onDelete('cascade');
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
