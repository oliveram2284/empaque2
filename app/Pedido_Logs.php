<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido_Logs extends Model
{
    //

    protected $table ='tbl_log_pedidos';
    protected $primaryKey = 'logId';
    public $timestamps = false;


    

    public function user()
    {
       // return $this->hasOne('App\User','id','usuarioId');
       
       return $this->hasOne('App\Usuarios','id_usuario','usuarioId');
    }
}
