<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

/**
 * Class Usuario
 * @package App\Models
 * @property mixed|string avatar
 * @property string avatar_url
 */
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
        'remember_token',
        'avatar'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class);
    }

    public function empresas()
    {
        return $this->belongsToMany(Empresa::class, 'colaboradores');
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

    /**
     * Crear propiedad avatar_url
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar === 'default.jpg') {
            return asset('uploads/avatars/default.jpg');
        }

        return Storage::disk('public')->url($this->avatar);
    }
}
