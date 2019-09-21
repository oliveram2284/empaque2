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
     * RELACION CON Logs GRUPO
    */
    public function logs(){
        return $this->hasMany('App\Pedido_Logs','pedidoId','npedido');
        // return $this->hasOne('App\Grupo','id_grupo','group_id');
    }

    /** 
     * RELACION CON TABLE CLIENTES
    */

    public function cliente(){
        return $this->hasOne('App\Clientes','cod_client','clientefact');
        // return $this->hasOne('App\Grupo','id_grupo','group_id');
    }

    public static function getNextNro(){
        $user = auth()->user();       
        $codigo= substr($user->username, 0,2);       
        $siguiente_pedido = Pedidos::select(\DB::raw("substr( codigo, 4, 4 ) as proximo"))->where('codigo', 'like', $codigo.'%')->orderBy('codigo', 'desc')->first();
        $cantidad = str_pad($siguiente_pedido->proximo + 1, 4, "0000", STR_PAD_LEFT);
        $codigo_pedido = $codigo."-".$cantidad."-".date("y");
        return $codigo_pedido;
    }

}
