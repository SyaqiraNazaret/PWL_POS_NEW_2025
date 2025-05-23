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
        Schema::create('t_stok', function (Blueprint $table) {
            $table->id('stok_id');
            $table->unsignedBigInteger('barang_id')->index(); // indexing untuk foreignkey
            $table->unsignedBigInteger('user_id')->index(); 
            $table->timestamp('stok_tanggal');// unique untuk memastikan tidak ada username yang sama
            $table->integer('stok_jumlah');
            $table->timestamps();

            // Mendefinisikan foreign key pada kolom level_id mengacu ke kolom level_id pada tabel m_level
            $table->foreign('barang_id')->references('barang_id')->on('m_barang');
            $table->foreign('user_id')->references('user_id')->on('m_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_stok');
    }
};
