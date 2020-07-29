<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Produto;

class siteController extends Controller
{

    public function index()
  {
    $produtos = Produto::select('*')->where('disponivel','on')->get();

      return view('index',compact('produtos'));
  }





}
