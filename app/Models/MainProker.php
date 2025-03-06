<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainProker extends Model
{
    use HasFactory;
    protected $table = 'tb_main_proker';

    protected $fillable = [
        'judul',
        'judul2',
        'deskripsi',
        'gambar',
        'gambardesk',
        'url',
        'tanggal_mulai',
        'tanggal_selesai',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi',
        'alamat_lengkap',
        'kategori',
        'biaya_tiket',
        'status',
        'kontak_info',
    ];

    protected $casts = [
        'gambardesk' => 'array',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'waktu_mulai' => 'datetime',
        'waktu_selesai' => 'datetime',
        'biaya_tiket' => 'decimal:2',
    ];

    public function prokers()
    {
        return $this->hasMany(Proker::class, 'main_proker_id');
    }
}