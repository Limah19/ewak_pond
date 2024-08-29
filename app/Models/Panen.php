<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panen extends Model
{
    use HasFactory;
    
    protected $table = 'panen';

    protected $fillable = [
        'tanggal_panen',
        'jumlah_ikan',
        'total_berat',
        'ikan_id',
        'kolam_id'
    ];

    public function ikan()
    {
        return $this->belongsTo(Ikan::class);
    }

    public function kolam()
    {
        return $this->belongsTo(Kolam::class);
    }
}
