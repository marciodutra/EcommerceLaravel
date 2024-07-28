<?php

namespace App\Models;

class Endereco extends Rmodel
{
   protected $table = "enderecos";
   protected $fillable = ['logradouro', 'complemento', 'numero', 'cep', 'cidade', 'estado', 'usuario_id'];

   public function usuario(){
    return $this->belongTo(Usuario::class, 'usuario_id');
   }

   public function setCepAttribute($cep){

        $value = preg_replace("/^0-9/", "",$cep);
        $this->attributes["cep"] = $value; 
 }
}
