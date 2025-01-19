<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainProker extends Model
{
    use HasFactory;
    protected $table = 'tb_main_proker';

   public function prokers()
    {
        return $this->hasMany(Proker::class, 'main_proker_id');
    }
}
