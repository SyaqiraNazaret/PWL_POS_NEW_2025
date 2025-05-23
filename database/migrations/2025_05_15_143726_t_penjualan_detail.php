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
        Schema::create('t_penjualan_detail', function (Blueprint $table) {
            $table->id('detail_id');
            $table->unsignedBigInteger('penjualan_id')->index(); // indexing untuk foreignkey
            $table->unsignedBigInteger('barang_id')->index(); 
            $table->integer('harga');// unique untuk memastikan tidak ada username yang sama
            $table->integer('jumlah');
            $table->timestamps();

            // Mendefinisikan foreign key pada kolom level_id mengacu ke kolom level_id pada tabel m_level
            $table->foreign('barang_id')->references('barang_id')->on('m_barang');
            $table->foreign('penjualan_id')->references('penjualan_id')->on('t_penjualan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_penjualan_detail');
    }
};
