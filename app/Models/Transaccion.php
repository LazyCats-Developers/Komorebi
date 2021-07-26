<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;
    protected $table="transacciones";
    public $timestamps = false;

    protected $fillable = [
        'producto_id',
        'proveedor_id',
        'empresa_id',
        'valor',
        'cantidad',
        'fecha',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
