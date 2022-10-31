<?php

namespace App\Controllers;

class Admin extends BaseController
{
   public function index()
   {
      $data = [
         'title' => 'Dashboard',
         'menu' => 'Dashboard',
         'subMenu' => ''
      ];
      return view('admin/index', $data);
   }
}
