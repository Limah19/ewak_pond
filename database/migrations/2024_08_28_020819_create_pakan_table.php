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
        Schema::create('pakan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_pakan');
            $table->string('jenis_pakan');
            $table->float('jumlah');
            $table->foreignId('ikan_id')->constrained('ikan')->onDelete('cascade');
            $table->foreignId('kolam_id')->constrained('kolam')->onDelete('cascade'); // Menambahkan kolam_id
            $table->date('tanggal_pemberian');            
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
        Schema::dropIfExists('pakan');
    }
};