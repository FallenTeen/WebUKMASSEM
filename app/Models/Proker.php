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
        'proker',
        'deskripsi',
        'gambar',
        'gambardesk',
        'kategori',
        'url',
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
        return $this->gambardesk ? asset('storage/' . $this->gambardesk) : null;
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

