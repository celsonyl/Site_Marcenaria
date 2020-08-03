<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produto;

class produtoController extends Controller
{

public function index(Request $req){
  $dados = $req->all();
  $produtos = Produto::all();

  return view('admin.adminProdutos',compact('produtos'));
}

  public function criar(Request $req)
  {
    $dados = $req->all();

    if($req->hasFile('imagem')){

      $allowedfileExtension=['jpg','png'];
      $imagem = $req->file('imagem');
      $filename = $imagem->getClientOriginalName();
      $extension = $imagem->getClientOriginalExtension();
      $check=in_array($extension,$allowedfileExtension);


      if($check)
      {
        $dir = "img/fotos-produtos";
        $imagem->move($dir,$filename);
        $dados['imagem'] = $dir."/".$filename;

        if(!isset($dados['disponivel']))
        {
          $dados['disponivel'] = "off";
        }
        $criar = Produto::create([
          'nome' => $dados['nome'],
          'descricao' => $dados['descricao'],
          'valor' => $dados['valor'],
          'foto' => $dados['imagem'],
          'disponivel' => $dados['disponivel'],
        ]);

        return redirect()->back();
      }
      else
      {
        // ARQUIVO NAO É .PNG OU .JPG ------- NÃO É FOTO
      }

    }
}


public function editar($id)
  {
    $produto = Produto::find($id);
    return view('admin.editar',compact('produto'));
  }



  public function atualizar(Request $req, $id)
    {
      $dados = $req->all();


      if($req->hasFile('foto')){

        $allowedfileExtension=['jpg','png'];
        $imagem = $req->file('foto');
        $filename = $imagem->getClientOriginalName();
        $extension = $imagem->getClientOriginalExtension();
        $check= in_array($extension,$allowedfileExtension);


        if($check)
        {
          $dir = "img/fotos-produtos";
          $imagem->move($dir,$filename);
          $dados['imagem'] = $dir."/".$filename;
        }
          if(!isset($dados['disponivel']))
          {
            $dados['disponivel'] = "off";
          }

          Produto::find($id)->update($dados);
          return redirect()->route('admin.produto.index');

    }  else
      {
      dd($dados);
      }
  }

  public function apagar($id)
  {
    Produto::find($id)->delete();
    return redirect()->back();
  }

}
