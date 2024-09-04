<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengeluarann', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal_pembelian');
            $table->string('nama_kolam', 200);
            $table->string('jenis_pakan');
            $table->float('jumlah_pakan');
            $table->string('harga_per', 200);
            $table->string('total_biaya');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengeluarann');
    }
};
