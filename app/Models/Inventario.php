<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function producto() 
    {
        return $this->belongsTo(Producto::class);
    }

    public function empresa() 
    {
        return $this->belongsTo(Empresa::class);
    }

    public function tipoProducto() 
    {
        return $this->belongsTo(TipoProducto::class);
    }
}
