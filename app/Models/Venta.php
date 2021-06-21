<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function usuario() 
    {
        return $this->belongsTo(Usuario::class);
    }

    public function documento() 
    {
        return $this->belongsTo(Documento::class);
    }

    public function carrosVenta() 
    {
        return $this->hasMany(CarroVenta::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'carro_venta');
    }
}
