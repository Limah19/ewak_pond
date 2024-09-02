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
        Schema::create('pemasukann', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal_panen');
            $table->string('nama_ikan',200);
            $table->string('harga_per', 200); // Harga per kg dengan 2 digit desimal
            $table->float('total_berat'); // Total berat dalam kg
            $table->string('total_pemasukan', 200); // Total biaya dengan 2 digit desimal
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
        Schema::dropIfExists('pemasukann');
    }
};
