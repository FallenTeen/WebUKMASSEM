<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'tb_anggota';
    protected $fillable = [
        'nama_lengkap',
        'nama_panggilan',
        'role',
        'status_anggota',
        'divisi',
        'angkatan',
        'no_hp',
        'alamat',
    ];
    protected $casts = [
        'role' => 'string',
        'status_anggota' => 'string',
        'divisi' => 'string',
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function presensiRapat()
    {
        return $this->hasMany(PresensiRapat::class, 'anggota_id');
    }
    public function rapat()
    {
        return $this->belongsToMany(Rapat::class, 'presensi_rapat', 'anggota_id', 'rapat_id')
            ->withPivot('status_kehadiran', 'keterangan')
            ->withTimestamps();
    }
}
