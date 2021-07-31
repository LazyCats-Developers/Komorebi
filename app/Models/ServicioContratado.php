<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioContratado extends Model
{
    use HasFactory;
    protected $table="servicios_contratados";


    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function modulo()
    {
        return $this->belongsTo(Modulo::class);
    }
}
