<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table="provedores";
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'rut',
        'telefono',
        'email',
        'direccion',
        'proveedor_rrss',
        'descripcion'
    ];

    public function transacciones() 
    {
        return $this->hasMany(Transaccion::class);
    }    
}
