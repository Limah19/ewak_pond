<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranPakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_pembelian',
        'kolam_id',
        'pakan_id',
        'harga_pakan_per_kg',
        'total_biaya',
    ];

    public function kolam()
    {
        return $this->belongsTo(Kolam::class);
    }

    public function pakan()
    {
        return $this->belongsTo(Pakan::class);
    }
}
