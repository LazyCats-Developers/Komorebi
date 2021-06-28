<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'inventarios';

    protected $fillable = [
        'producto_id',
        'emrpesa_id',
        'cantidad',
        'tipo_producto_id',
        'precio_unitario'
    ];

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
