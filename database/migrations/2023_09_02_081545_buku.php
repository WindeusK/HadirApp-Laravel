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
        $table->string('judul');
        $table->string('isbn');
        $table->integer('jumlah');
        $table->string('penulis');
        $table->text('sinopsis');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
