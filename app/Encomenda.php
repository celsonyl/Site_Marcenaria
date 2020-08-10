<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encomenda extends Model
{
    protected $fillable = [
        'idCliente', 'idProduto', 'quantidade','valor','situacao'
    ];
}
