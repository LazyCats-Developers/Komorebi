<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarroVenta extends Model
{
    use HasFactory;
    protected $table = "carro_venta";
    public $timestamps = false;

    public function venta() 
    {
        return $this->belongsTo(Venta::class);
    }

    public function producto() {
        return $this->belongsTo(Producto::class);
    }
}
