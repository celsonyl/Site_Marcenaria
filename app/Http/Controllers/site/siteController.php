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
      return view('index');
  }
}
