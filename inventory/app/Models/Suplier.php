<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
   use HasFactory;
   protected $table = "supplier";
   protected $fillable = [
      'Kode_suplier',
      'Nama_suplier',
      'Alamat_suplier',
      'No_tlp',
      'Email'
   ];
}
