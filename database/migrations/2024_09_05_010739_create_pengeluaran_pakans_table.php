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
        Schema::create('pengeluaran_pakans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pembelian');
            $table->foreignId('kolam_id')->constrained('kolam')->onDelete('cascade');
            $table->foreignId('pakan_id')->constrained('pakan')->onDelete('cascade');
            $table->decimal('harga_pakan_per_kg', 8, 2);
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
        Schema::dropIfExists('pengeluaran_pakans');
    }
};
