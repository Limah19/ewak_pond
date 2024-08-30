<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    
    protected $table = 'pemasukan';

    protected $fillable = [
        'tanggal_panen',
        'nama_ikannya',
        'harga_per',
        'total_berat',
        'pemasukan_kotor',
        'total_biaya',
        'pemasukan_bersih'
    ];
}
