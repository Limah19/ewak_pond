<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasukanPanen extends Model
{
    use HasFactory;

    protected $table = 'pemasukan_panen';

    protected $fillable = [
        'tanggal_panen',
        'kolam_id',
        'panen_id',
        'harga_per_kg',
        'pemasukan_kotor',
        'pemasukan_bersih',
        'pengeluaran_bibit_id',
        'pengeluaran_pakan_id',
        'pengeluaran_lainnya'
    ];

    public function kolam()
    {
        return $this->belongsTo(Kolam::class);
    }

    public function panen()
    {
        return $this->belongsTo(Panen::class);
    }

    // Di model PemasukanPanen
    public function pengeluaran_bibit()
    {
        return $this->belongsTo(PengeluaranBibit::class, 'pengeluaran_bibit_id');
    }

    public function pengeluaran_pakan()
    {
        return $this->belongsTo(PengeluaranPakan::class, 'pengeluaran_pakan_id');
    }
}
