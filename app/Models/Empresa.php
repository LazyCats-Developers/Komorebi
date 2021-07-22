<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table='empresas';

    protected $fillable = [
        'id',
        'nombre',
        'direccion',
        'telefono',
        'email',
        'rut',
        'descripcion',
        'logo',
        'empresa_rrss'
    ];

    public function serviciosContratados()
    {
        return $this->hasMany(ServicioContratado::class);
    }

    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class);
    }

    public function transacciones()
    {
        return $this->hasMany(Transaccion::class);
    }

    public function inventarios()
    {
        return $this->hasMany(Inventario::class);
    }

}
