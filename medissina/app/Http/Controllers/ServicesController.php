<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
  public static function messageValidation()
  {
    $message = [
      'required' => ':attribute tidak boleh kosong',
      'unique'   => ':attribute sudah digunakan',
      'numeric'  => 'input :attribute harus berupa angka',
      'string'   => 'input :attribute harus berupa huruf',
      'file'     => ':attribute harus berupa file',
      'image'    => ':attribute harus berupa gambar',
      'min'      => ':attribute tidak boleh kurang dari : :min',
      'max'      => ':attribute tidak boleh lebih dari : :max'
    ];
    return $message;
  }
}
