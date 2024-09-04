<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluarann extends Model
{
    use HasFactory;
    
    protected $table = 'pengeluarann';

    protected $fillable = [
        'tanggal_pembelian',
        'nama_kolam',
        'jenis_pakan',
        'jumlah_pakan',
        'harga_per',
        'total_biaya',
    ];
}
