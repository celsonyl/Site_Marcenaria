<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Carrinho;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;


class carrinhoController extends Controller
{
    public function index()
    {
      if (Auth::check())
        {
            // The user is logged in...
            $id = Auth::user()->id;
            $user = User::find($id);

            if($user->nivel_acesso == 'cliente')
            {
              Alert::error('Você não compra produtos!');
              return redirect()->route('site.index');
            }
            else
            {
              Alert::error('Você não compra produtos!');
              return redirect()->route('site.index');
            }


        }
      else
        {
          Alert::error('É preciso estar logado para ver o carrinho!');
          return redirect()->route('site.index');
        }
    }




    public function adicionar(Request $req)
    {
      $dados = $req->all();

      $id = Auth::user()->id;
      $user = User::find($id);
      if (Auth::check())
      {

        if($dados['quantidade'] == 0)
        {
        Alert::error('Quantidade deve ser preenchido!');
        return back();
        }
        if($user->nivel_acesso == 'admin')
        {
          Alert::error('Você não compra produtos!');
          return redirect()->route('site.index');
        }

        $cria_produto = Carrinho::create([
          'idCliente' => Auth::user()->id,
          'idProduto' => $dados['idProduto'],
          'quantidade' => $dados['quantidade'],
        ]);

        if($cria_produto)
        {
          Alert::success('Produto adicionado ao carrinho!');
          return back();
        }

      }
      else {
        Alert::error('É preciso estar logado para efetuar encomendas!');
        return back();
      }

    }


    public function remover()
    {

    }
}
