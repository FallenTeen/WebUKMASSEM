<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    use HasFactory;
    protected $table = 'tb_proker';
    protected $fillable = [
        'main_proker_id',
        'judul',
        'deskripsi',
        'gambar',
        'gambardesk',
        'kategori',
        'tanggal',
        'tags',
    ];

    protected $casts = [
        'tags' => 'array',
        'gambardesk' => 'array',
    ];
    protected $attributes = [
        'kategori' => 'sekunder',
    ];
    public function getGambarUrlAttribute()
    {
        return $this->gambar ? asset('storage/' . $this->gambar) : null;
    }

    public function getGambardeskUrlAttribute()
    {
        if ($this->gambardesk && is_array($this->gambardesk)) {
            return array_map(fn($gambar) => asset('storage/' . $gambar), $this->gambardesk);
        }
        return null;
    }

    public function rapat()
    {
        return $this->hasMany(Rapat::class, 'proker_id');
    }
    public function mainProker()
    {
        return $this->belongsTo(MainProker::class, 'main_proker_id');
    }
}

