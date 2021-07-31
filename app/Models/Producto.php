<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table='productos';
    protected $fillable = [
        'nombre',
        'marca',
        'unidad_id',
        'descripcion',
        'codigo'
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

    public function unidad(){
        return $this->belongsTo(Unidad::class);
    }

    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'carro_venta');
    }
}
