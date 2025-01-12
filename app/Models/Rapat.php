<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    use HasFactory;

    protected $table = 'tb_rapat';

    protected $fillable = [
        'judul',
        'jenis_rapat',
        'deskripsi',
        'tags',
        'notulensi',
        'tanggal',
        'proker_id'
    ];

    public function proker()
    {
        return $this->belongsTo(Proker::class, 'proker_id');
    }
    public function getJenisRapatAttribute($value)
    {
        return ucfirst($value); // Mengubah 'proker' menjadi 'Proker'
    }
    public function presensi()
    {
        return $this->hasMany(PresensiRapat::class, 'rapat_id');
    }

}
