<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class carrinhoController extends Controller
{
    public function index()
    {
      return view('cliente.carrinho');
    }




    public function adicionar()
    {

    }


    public function remover()
    {

    }
}
