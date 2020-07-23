<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Illuminate\Database\QueryException;
use Auth;

class cadastroController extends Controller
{
  public function index()
  {

    if (Auth::check())
      {
          // The user is logged in...
          $id = Auth::user()->id;
          $user = User::find($id);
          if($user->nivel_acesso == 'admin')
          {
            return redirect()->route('admin.index');
          }
          if($user->nivel_acesso == 'cliente')
          {
            return redirect()->route('site.index');
          }

      }
    else  {
        return view('cadastro');
          }

  }





  public function criar(Request $req)
  {
    $dados = $req->all();


      $criar = User::create([
        'name' => $dados['name'],
        'email' => $dados['email'],
        'telefone' => $dados['telefone'],
        'password' => bcrypt($dados['password']),
        'nivel_acesso' => $dados['nivel_acesso'],
      ]);

    if($criar)
    return redirect()->route('site.login');


  }



}
