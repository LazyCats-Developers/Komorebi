<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;
    public $timestamps = false;
    protected $table = 'usuarios';
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'direccion',
        'password',
        'remember_token'
    ];

    protected $hidden = [
        'password',
        'remeber_token'
    ];
    
    public function colaboradores() 
    {
        return $this->hasMany(Colaborador::class);
    }

    public function roles() 
    {
        return $this->belongsToMany(Rol::class, 'colaboradores');
    }

    public function historiales() 
    {
        return $this->hasMany(Historial::class);
    }

    public function ventas() 
    {
        return $this->hasMany(Venta::class);
    }
}
