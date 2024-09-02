<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukann extends Model
{
    use HasFactory;
    
    protected $table = 'pemasukann';

    protected $fillable = [
        'tanggal_panen',
        'nama_ikan',
        'harga_per',
        'total_berat',
        'total_pemasukan'

    ];
}
