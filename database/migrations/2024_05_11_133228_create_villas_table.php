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
        Schema::create('villas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemilik_id');
            $table->json('gambar');
            $table->string("nama_villa");
            $table->string("harga");
            $table->string("alamat");
            $table->string("lokasi");
            $table->string("status");
            $table->string("kamar_tidur");
            $table->string("jumlah_wc");
            $table->string("jumlah_cctv");
            $table->string("daya_tampung");
            $table->string("luas");
            $table->text("keterangan")->nullable();
            $table->timestamps();

            $table->foreign('pemilik_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villas');
    }
};
