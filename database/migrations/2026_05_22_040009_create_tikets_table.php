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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tiket')->unique(); // Contoh: TKT-EVN001
            $table->string('nama_event');
            $table->string('kategori'); // VIP, Reguler, VVIP
            $table->integer('harga'); // Untuk nominal harga tiket
            $table->integer('kuota_total'); // Kuota awal yang disediakan
            $table->integer('kuota_tersedia'); // Sisa kuota untuk validasi rumus IF nanti
            $table->timestamps(); // Menggenerate created_at dan updated_at (Poin Sorting)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};