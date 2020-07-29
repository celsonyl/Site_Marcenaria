<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produto;

class produtoController extends Controller
{


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


      }
      else
      {
        // ARQUIVO NAO É .PNG OU .JPG ------- NÃO É FOTO
      }




    }
}


  public function apagar(Request $req)
  {
    $dados = $req->all();
    dd($dados);
  }

}
