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
        Schema::create('pengeluaran_bibits', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pembelian');
            $table->foreignId('kolam_id')->constrained('kolam')->onDelete('cascade');
            $table->foreignId('ikan_id')->constrained('ikan')->onDelete('cascade');
            $table->decimal('harga_bibit_per_ekor', 8, 2);
            $table->decimal('total_biaya', 15, 2);
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
        Schema::dropIfExists('pengeluaran_bibits');
    }
};
