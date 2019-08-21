<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','full_name', 'password','group_id','catId'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /** 
     * RELACION CON TABLE GRUPO
    */

    public function grupo()
    {
        return $this->hasOne('App\Grupo','id_grupo','group_id');
    }

    /** 
     * RELACION CON TABLE CATEGORIA
    */

    public function categoria()
    {
        return $this->hasOne('App\CategoriaUsuario','id','catId');
    }
}
