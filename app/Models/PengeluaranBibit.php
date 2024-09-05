<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranBibit extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_pembelian',
        'kolam_id',
        'ikan_id',
        'harga_bibit_per_ekor',
        'total_biaya',
    ];

    public function kolam()
    {
        return $this->belongsTo(Kolam::class);
    }

    public function ikan()
    {
        return $this->belongsTo(Ikan::class);
    }
}
