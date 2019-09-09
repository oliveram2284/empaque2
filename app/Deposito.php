<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    //
    protected $table ='depositos';
    protected $primaryKey = 'id_deposito';
    public $timestamps = false;


    protected $fillable = [
        'codigo','nombre','direccion','localidad','provincia','telefono','id_vendedor','observacion'
    ];

    /** 
     * RELACION CON TABLE GRUPO
    */

    public function vendedor()
    {
        return $this->hasOne('App\User','id','id_vendedor');
    }
}
