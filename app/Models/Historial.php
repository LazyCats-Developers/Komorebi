<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;
    protected $table="historiales";


    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function tipoLog()
    {
        return $this->belongsTo(TipoLog::class);
    }
}
