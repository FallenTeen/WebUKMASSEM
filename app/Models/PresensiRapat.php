<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiRapat extends Model
{
    use HasFactory;

    protected $table = 'tb_presensi_rapat';

    protected $fillable = [
        'rapat_id',
        'anggota_id',
        'status_kehadiran',
        'keterangan',
    ];

    public function rapat()
    {
        return $this->belongsTo(Rapat::class, 'rapat_id');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
}
