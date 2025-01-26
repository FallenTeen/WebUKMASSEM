<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambardeskCache extends Model
{
    use HasFactory;

    protected $table = 'gambardesk_cache';

    protected $fillable = [
        'path',
        'temp_id',
        'session_id',
        'user_id',
    ];
}
