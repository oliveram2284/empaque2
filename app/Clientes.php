<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    //

    protected $table ='clientes';
    protected $primaryKey = 'cod_client';
    public $timestamps = false;
    protected $fillable = [
        //'username','full_name', 'password','group_id','catId'
    ];
}
