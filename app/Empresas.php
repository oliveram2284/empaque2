<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    //

    protected $table ='empresas';
    protected $primaryKey = 'id_empresa';
    public $timestamps = false;

    protected $fillable = [
        'descripcion'
    ];
}
