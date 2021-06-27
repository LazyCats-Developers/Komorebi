<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;
    protected $table="colaboradores";
    public $timestamps = false;

    protected $fillable = [
        'cargo_usuario'
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
