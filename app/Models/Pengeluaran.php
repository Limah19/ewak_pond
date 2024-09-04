<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    
    protected $table = 'pengeluaran'; // Nama tabel dalam database

    protected $fillable = [
        'tanggal_pembelian', // Kolom tanggal pembelian
        'nama_kolam',
        'nama_ikan',         // Kolom nama ikan
        'jumlah_ikan',       // Kolom jumlah ikan
        'harga_per',         // Kolom harga per ekor
        'total_biaya',       // Kolom total biaya
    ];
}
