<?php

namespace App\Models;

class Produto extends Rmodel
{
   protected $table = "produtos";
   protected $fillable = ['nome', 'foto', 'descricao', 'categoria_id', 'valor'];
}
