<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pakan extends Model
{
    use HasFactory;
    
    protected $table = 'pakan';

    protected $fillable = [
        'nama_pakan',
        'jenis_pakan',
        'jumlah_pakan',
        'ikan_id',
        'kolam_id', // Menambahkan kolam_id
        'tanggal_pemberian'
    ];

    public function ikan()
    {
        return $this->belongsTo(Ikan::class, 'ikan_id', 'id');
    }

    public function kolam()
    {
        return $this->belongsTo(Kolam::class, 'kolam_id', 'id');
    }
}
