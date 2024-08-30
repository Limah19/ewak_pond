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
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal_panen');
            $table->string('nama_ikannya');
            $table->decimal('harga_per'); // Harga per kg dengan 2 digit desimal
            $table->float('total_berat'); // Total berat dalam kg
            $table->decimal('pemasukan_kotor'); // Pemasukan kotor dengan 2 digit desimal
            $table->decimal('total_biaya'); // Total biaya dengan 2 digit desimal
            $table->decimal('pemasukan_bersih'); // Pemasukan bersih dengan 2 digit desimal
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemasukan');
    }
};
