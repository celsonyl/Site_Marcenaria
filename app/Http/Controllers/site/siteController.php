<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class siteController extends Controller
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
          
      }

          else
          {
            return view('index');
          }

      }

}
