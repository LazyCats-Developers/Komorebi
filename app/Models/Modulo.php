<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function serviciosContratados()
    {
        return $this->hasMany(ServicioContratado::class);
    }    
}
