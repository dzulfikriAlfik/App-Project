<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
   public static function costomMessageValidation()
   {
      $message = [
         'required'  => ':attribute tidak boleh kosong',
         'unique'    => ':attribute sudah digunakan',
         'numeric'    => 'input :attribute harus berupa angka',
         'string'    => 'input :attribute harus berupa huruf',
      ];
      return $message;
   }
}
