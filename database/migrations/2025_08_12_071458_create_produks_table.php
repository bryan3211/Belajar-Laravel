<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('nama_produk', 100);
            $table->integer('harga');
            $table->text('deskripsi_produk');
            $table->unsignedBigInteger('kategori_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_produk');
    }
};