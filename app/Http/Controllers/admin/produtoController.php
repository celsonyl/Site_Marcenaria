<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produto;
use RealRashid\SweetAlert\Facades\Alert;


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

    if($req->hasFile('imagem'))
    {

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

        Alert::success('Produto cadastrado com sucesso!');
        return redirect()->back();
      }
      else
      {
        Alert::error('Apenas arquivos .png e .jpg!');
        return redirect()->back();
      }

    }
    else
    {
      Alert::error('Insira a foto!');
        return redirect()->back();
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


      if($req->hasFile('foto'))
      {

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


          Produto::where('id',$id)->update([
            'nome' => $dados['nome'],
            'descricao' => $dados['descricao'],
            'valor' => $dados['valor'],
            'foto' =>  $dados['imagem'],
            'disponivel' => $dados['disponivel'],
          ]);

          Alert::success('Produto atualizado com sucesso!');
          return redirect()->back();

    }  else
      {
        Alert::error('Insira a foto!');
        return redirect()->back();
      }
  }

  public function apagar($id)
  {
    Produto::find($id)->delete();
    Alert::success('Produto deletado com sucesso!');
        return redirect()->back();
  }

}
