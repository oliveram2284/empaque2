<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    //

    protected $table ='pedidos';
    protected $primaryKey = 'npedido';
    public $timestamps = false;
    protected $fillable = [
        //'username','full_name', 'password','group_id','catId'
    ];

    /** 
     * RELACION CON TABLE GRUPO
    */
    public function logs(){
        return $this->hasMany('App\Pedido_Logs','pedidoId','npedido');
        // return $this->hasOne('App\Grupo','id_grupo','group_id');
    }

    /** 
     * RELACION CON TABLE GRUPO
    */
}
