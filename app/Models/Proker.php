<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Proker extends Model
{
    use HasFactory;

    protected $table = 'tb_proker';

    protected $fillable = [
        'main_proker_id',
        'judul',
        'slug',
        'deskripsi',
        'excerpt',
        'gambar',
        'gambardesk',
        'kategori',
        'tanggal',
        'tags',
        'status',
        'priority',
    ];

    protected $casts = [
        'tags' => 'array',
        'gambardesk' => 'array',
        'tanggal' => 'datetime:Y-m-d',
    ];

    protected $attributes = [
        'kategori' => 'sekunder',
        'status' => 'draft',
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
        return [];
    }

    public function getTagsAttribute($value)
    {
        if (is_string($value)) {
            $decoded = json_decode($value, true);

            return is_array($decoded) ? $decoded : [];
        }

        // If it's already an array, return it
        // If it's something else, return an empty array
        return is_array($value) ? $value : [];
    }
    public function setTagsAttribute($value)
    {
        $this->attributes['tags'] = json_encode(array_map('trim', $value));
    }

    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    public function scopeTanggalBetween($query, $startDate, $endDate)
    {
        return $query->whereBetween('tanggal', [$startDate, $endDate]);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function rapat()
    {
        return $this->hasMany(Rapat::class, 'proker_id');
    }

    public function mainProker()
    {
        return $this->belongsTo(MainProker::class, 'main_proker_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }


}