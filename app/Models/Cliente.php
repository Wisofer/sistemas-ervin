<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    
    protected $fillable = [
        'codigo',
        'nombres',
        'apellidos',
        'cedula',
        'codigo_pais',
        'telefono',
        'servicio',
        'plan',
        'sector',
        'estacion_base',
        'tecnologia',
        'estado',
        'fecha_inicio',
        'fecha_finalizacion',
    ];
}
