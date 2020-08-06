<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class encomendaController extends Controller
{
    public function index()
    {

    }




    public function adicionar(Request $req)
    {
        $dados = $req->all();

        dd($dados);


    }




    public function remover()
    {


    }
}

