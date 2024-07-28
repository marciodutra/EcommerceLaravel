<?php

namespace App\Models;

class Pedido extends Rmodel
{
   protected $table = "pedidos";
   protected $dates = ["datapedido"];
   protected $fillable = ['datapedido', 'status', 'usuario_id'];

   public function statusDesc(){
    $desc = "";
    switch($this->status){
        case 'pen' : $desc = "PENDENTE";break;
        case 'apr' : $desc = "APROVADO";break;
        case 'can' : $desc = "CANCELADO";break;
    }
    return $desc;
   }
}
