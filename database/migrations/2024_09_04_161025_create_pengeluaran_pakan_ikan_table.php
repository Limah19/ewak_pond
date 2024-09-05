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
        Schema::create('pengeluaran_pakan_ikan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pembelian');   
            $table->foreignId('kolam_id')->constrained('kolam')->onDelete('cascade'); // Mengambil nama kolam dan nama ikan
            $table->foreignId('pakan_id')->constrained('pakan')->onDelete('cascade'); // Mengambil jumlah pakan
            $table->decimal('harga_pakan_per_kg', 10, 3); // Harga pakan per kilogram
            $table->decimal('total_biaya', 15, 3); // Total biaya pengeluaran untuk pakan
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
        Schema::dropIfExists('pengeluaran_pakan_ikan');
    }
};
