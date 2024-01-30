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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_transaksi');
            $table->foreignId('anggota_id')->references('id')->on('anggotas')->cascadeOnDelete();
            $table->foreignId('buku_id')->references('id')->on('books')->cascadeOnDelete();
            $table->date('tgl_peminjaman');
            $table->date('tgl_pengembalian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
