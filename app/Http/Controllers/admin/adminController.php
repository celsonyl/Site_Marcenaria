<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class adminController extends Controller
{
  public function index()
  {
    $user = Auth::user(array('id','name','email','nivel_acesso','foto_perfil'));
    if($user->nivel_acesso != 'admin')
    {
      return redirect()->route('site.index');
    }
    else
    return view('admin.adminTela',compact('user'));
  }








  }
