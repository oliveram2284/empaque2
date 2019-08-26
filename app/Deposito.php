<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    //
    protected $table ='depositos';
    protected $primaryKey = 'id_deposito';
    public $timestamps = false;
}
