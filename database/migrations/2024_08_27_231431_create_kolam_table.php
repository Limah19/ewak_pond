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
        Schema::create('kolam', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_kolam', 100); // Mengubah kolom 'nama_kolam' dengan tipe string
            $table->float('ukuran_kolam'); // Mengubah kolom 'ukuran_kolam' dengan tipe float
            $table->string('nama_ikan');
            $table->integer('jumlah_ikan');
            $table->boolean('status'); // Mengubah kolom 'status' menjadi boolean
            $table->timestamps(); // Tetap menggunakan timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kolam');
    }
};