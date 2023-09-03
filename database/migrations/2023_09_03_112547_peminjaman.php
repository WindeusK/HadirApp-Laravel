<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(Blueprint $table): void
    {
        $table->id();
        $table->string('judul_buku');
        $table->integer('jumlah');
        $table->foreignId('id_peminjam')->constrained('siswa');
        $table->dateTime('tanggal_pinjam');
        $table->dateTime('batas_pinjam');
        $table->dateTime('tanggal_kembali')->nullable();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
