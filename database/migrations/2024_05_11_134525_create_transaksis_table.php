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
            $table->json('gambar');
            $table->string('nama_villa');
            $table->string('harga');
            $table->string('berat');
            $table->string('stok');
            $table->text('deskripsi');
            $table->string('jumlah_terjual')->nullable();
            $table->string('rating')->nullable();
            $table->string('no_wa')->nullable();
            $table->string('link_shopee')->nullable();
            $table->string('link_tokopedia')->nullable();
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
