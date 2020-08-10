<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Carrinho;
use App\Encomenda;
use App\Produto;
use Auth;
use App\User;

class encomendaController extends Controller
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
              $itens_encomendas = Encomenda::select('*')->where('idCliente',$id)->get();
              return view('cliente.encomendas',compact('itens_encomendas'));
            }
            else
            {
              Alert::error('Você acessa essa página!');
              return redirect()->route('site.index');
            }


        }
      else
        {
          Alert::error('É preciso estar logado para ver as encomendas!');
          return redirect()->route('site.index');
        }

    }




    public function adicionar(Request $req)
    {
        $dados = $req->all();

        $select_carrinho = Carrinho::select('*')->where('idCliente',$dados['idCliente'])->get();

        

        foreach($select_carrinho as $produto_carrinho)
        {

            $valor = Produto::select('valor')->where('id',$produto_carrinho->idProduto)->first();

            $adicionar_encomenda = Encomenda::create([
                'idCliente' => $dados['idCliente'],
                'idProduto' => $produto_carrinho->idProduto,
                'quantidade' => $produto_carrinho->quantidade,
                'valor' => $valor->valor,
                'situacao' => "aberto"
            ]);
        }

        Carrinho::where('idCliente',$dados['idCliente'])->delete();
        Alert::success('Encomenda realizada com sucesso!');
        return back();

        


    }




    public function remover()
    {


    }
}

