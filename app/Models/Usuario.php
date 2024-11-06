<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
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
    //
}
