<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User;

class Usuario extends User implements AuthenticatableContract
{
    protected $table = "usuarios";
    protected $fillable = ['email', 'login', 'password', 'nome'];

    public function getAuthIdentifierName(){
        return "login";
    }
    public function getAuthIdentifier(){
        return $this->login;
    }

    public function getAuthPassword(){
        return $this->password;
    }

    public function getRememberToken(){

    }

    public function setRememberToken($value){

    }

    public function getRememberTokenName(){

    }

    public function setLoginAttribute($login){
       $value = preg_replace("/^0-9/", "",$login);
       $this->attributes["login"] = $value; 
    }

}

