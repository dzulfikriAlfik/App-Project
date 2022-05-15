<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function Users(){
      return view('Users', ["title" => 'Users']);
    }
}
