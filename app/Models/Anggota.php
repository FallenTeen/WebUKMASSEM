<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    //Buat relasi ke user
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
