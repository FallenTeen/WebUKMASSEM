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
        Schema::create('tb_rapat', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->enum('jenis_rapat', ['proker', 'non_proker']);
            $table->text('deskripsi')->nullable();
            $table->json('tags')->nullable();
            $table->text('notulensi')->nullable();
            $table->timestamp('tanggal')->nullable();
            $table->foreignId('proker_id')->nullable()->constrained('tb_proker')->onDelete('set null')->comment('Hubungan dengan tb_proker jika jenis rapat adalah proker'); // Hubungan dengan proker jika jenis rapat adalah proker
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_rapat');
    }
};
