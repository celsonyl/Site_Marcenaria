<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class loginController extends Controller
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
          return view('login');
            }

    }


  public function entrar(Request $req)
  {
  try{
    $dados = $req->all();

    $rememberMe = false;

    if(isset($req->rememberMe))
    $rememberMe = true;



      if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password'],'nivel_acesso'=>'cliente'],$rememberMe))
      {
        return redirect()->route('site.index');
      }
      else if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password'],'nivel_acesso'=>'admin'],$rememberMe))
      {
        return redirect()->route('admin.index');
      }
      else {
        return back()->with('warning', 'Senha ou e-mail incorreto!');
      }

    }catch(\Illuminate\Database\QueryException $ex){
      return redirect()->route('site.login')->withErrors(['active'=>'Algo deu muito errado amigo!']);
    }


  }


  public function sair()
  {
    Auth::logout();
    return redirect()->route('site.index');
  }






}
