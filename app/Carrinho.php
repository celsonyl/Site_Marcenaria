<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
  protected $fillable = [
      'idCliente', 'idProduto', 'quantidade',
  ];
}
