<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoLog extends Model
{
    use HasFactory;
    protected $table="tipos_rol";


    public function historiales()
    {
        return $this->hasMany(Historial::class);
    }
}
