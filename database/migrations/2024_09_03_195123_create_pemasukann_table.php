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
            $table->bigIncrements('id'); // Sudah auto increment dan primary key
            $table->date('tanggal_panen');
            $table->string('nama_kolam', 200);
            $table->string('nama_ikan', 200);
            $table->numeric('harga_per', 15, 3);
            $table->double('total_berat', 8, 2);
            $table->numeric('total_pemasukan', 15, 3); 
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
