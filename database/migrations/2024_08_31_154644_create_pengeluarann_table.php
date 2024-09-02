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
            $table->string('jenis_pakan');
            $table->float('jumlah_pakan');
            $table->integer('harga_per');
            $table->integer('total_biaya');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengeluarann');
    }
};
