<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    use HasFactory;
    protected $table="tipos_producto";
    public $timestamps = false;
    protected $fillable =[
        'nombre',
        'descripcion'
    ];

    public function inventarios() 
    {
        return $this->hasMany(Inventario::class);
    }
}
