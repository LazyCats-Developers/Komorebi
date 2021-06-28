<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table='productos';
    protected $fillable = [
        'nombre',
        'marca',
        'unidad',
        'descripcion'
    ];
    public function carrosVenta() 
    {
        return $this->hasMany(CarroVenta::class);
    }

    public function transacciones()
    {
        return $this->hasMany(Transaccion::class);
    }

    public function inventarios()
    {
        return $this->hasMany(Inventario::class);
    }

    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'carro_venta');
    }
}
