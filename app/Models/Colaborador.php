<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;
    protected $table="colaboradores";


    protected $fillable = [
        'usuario_id',
        'empresa_id',
        'cargo_usuario',
        'rol_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
