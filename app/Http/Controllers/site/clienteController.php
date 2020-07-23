<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Illuminate\Database\QueryException;
use Auth;
use Crypt;
use Carbon;

class clienteController extends Controller
{
    public function index(){

    }

    public function confirmarEmail(Request $req)
    {

      $dados = $req->all();

      $email = decrypt($dados['token']);
      $id = decrypt($dados['id']);
      $verificado = User::select('email_verified_at')->where('id',$id)->get();
      //->whereNull('email')
      $procura_email = User::select('email')
      ->where('id',$id)
      ->get();



      foreach($verificado as $usuario)
      {
        if($usuario->email_verified_at == null)
        {
          date_default_timezone_set('America/Sao_Paulo');
          $mytime = Carbon\Carbon::now();
          User::find($id)->update(['email_verified_at' => $mytime->toDateTimeString()]);
            echo "Email confirmado com sucesso!";
        }

        elseif($usuario->email_verified_at != null) {
            echo "Erro! Seu email já foi confirmado";
        }
        else
        {
          echo "Dados Inválidos";
        }

      }
    }


}
