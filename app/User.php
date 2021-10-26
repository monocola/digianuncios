<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','lastname','phone','country','birthdate','state','visitor', 'tipo','avatar','password','level',
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


    public function obtenerRol(){
        return $this->tipo;
    }

    public function getType($id)
    {

        if($id == 1){
            return 'Anunciante';
        }
        if($id == 2){
            return 'Visitante';
        }
        if($id == 8355023){
            return 'Administrador';
        }
    }

    public function getState($id)
    {

        if($id == 0){
            return 'Activo';
        }
        if($id == 1){
            return 'Bloqueado';
        }

    }

    public function getEmailVerified($id)
    {

        if($id){
            return 'EMAIL VERIFICADO CORRECTAMENTE';
        }else{
            return 'AÚN NO SE HA VERIFICADO EL EMAIL';
        }


    }

    public function levelUser($level)
    {
        if($level == 2){

            return 'ORO';

        }
        if($level == 1){
            return 'PLATA';
        }
        if($level ==0){
            return 'BRONCE';
        }
    }

    public function subLevelUser($level)
    {
        if($level == 2){

            return 'Anunciante Destacado';

        }
        if($level == 1){
            return 'Anunciante Competente';
        }
        if($level ==0){
            return 'Anunciante Principiante';
        }
    }

}
