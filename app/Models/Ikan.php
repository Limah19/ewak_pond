<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikan extends Model
{
    use HasFactory;
    
    protected $table = 'ikan';

    protected $fillable = [
        'nama_ikan',
        'jenis_ikan',
        'jumlah',
        'berat_rata_rata',
        'kolam_id'
    ];

    public function kolam() {
        return $this->belongsTo(Kolam::class, 'kolam_id', 'id');
    }
}
