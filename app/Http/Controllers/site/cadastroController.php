<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Illuminate\Database\QueryException;
use Auth;
use Crypt;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\Teste;
use Exception;



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
    try{
    
    $dados = $req->all();


      $criar = User::create([
        'name' => $dados['name'],
        'email' => $dados['email'],
        'telefone' => $dados['telefone'],
        'password' => bcrypt($dados['password']),
        'nivel_acesso' => $dados['nivel_acesso'],
      ]);

    if($criar){
      $user = User::select('id')->where('email',$dados['email'])->get();
      $key = Crypt::encrypt($dados['email']);

      foreach ($user as $confirma) {
        $dados['id'] = Crypt::encrypt($confirma['id']);


        Mail::to($dados['email'])->send(new Teste($key,$dados));
        Alert::success('Conta criada com sucesso!
        Confirme seu Email para poder entrar em sua conta');
      }
      return redirect()->route('site.login');
    }
  }catch(Exception $e){
      Alert::error('E-mail inválido ou já existente!');
      return redirect()->back();
    }
  }
}




