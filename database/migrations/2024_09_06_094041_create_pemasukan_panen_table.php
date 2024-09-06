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
        Schema::create('pemasukan_panen', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_panen');
            $table->foreignId('kolam_id')->constrained('kolam')->onDelete('cascade');
            $table->foreignId('panen_id')->constrained('panen')->onDelete('cascade');
            $table->decimal('harga_per_kg', 15, 2);
            $table->decimal('pemasukan_kotor', 15, 2);
            $table->decimal('pemasukan_bersih', 15, 2);
            $table->foreignId('pengeluaran_bibit_id')->constrained('pengeluaran_bibit')->onDelete('cascade');
            $table->foreignId('pengeluaran_pakan_id')->constrained('pengeluaran_pakan')->onDelete('cascade');
            $table->decimal('pengeluaran_lainnya', 15, 2)->nullable(); // Tambahan pengeluaran lainnya
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
        Schema::dropIfExists('pemasukan_panen');
    }
};
