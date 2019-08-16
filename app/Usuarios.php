<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    //

    protected $fillable = [
        'nombre', 'nombre_real', 'contrasenia','creado_por','id_tipo','id_sector','id_puesto','id_grupo','catId',
    ];
}
