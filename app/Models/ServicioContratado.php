<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioContratado extends Model
{
    use HasFactory;
    protected $table="servicios_contratados";
    protected $timestamps=false;
}
