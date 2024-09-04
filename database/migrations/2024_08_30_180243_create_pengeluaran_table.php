<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID unik untuk setiap pengeluaran
            $table->date('tanggal_pembelian'); // Tanggal pembelian
            $table->string('nama_kolam', 200);
            $table->string('nama_ikan', 100); // Nama ikan
            $table->integer('jumlah_ikan'); // Jumlah ikan
            $table->string('harga_per', 200); // Harga per ekor dengan 2 digit desimal
            $table->string('total_biaya'); 
            $table->timestamps(); // Menyimpan waktu pembuatan dan pembaruan data
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengeluaran');
    }
};
