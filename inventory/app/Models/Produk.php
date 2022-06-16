<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
   use HasFactory;
   protected $table = "produk";
   protected $fillable = [
      'kode_barang',
      'nama_barang',
      'harga_barang',
      'jumlah_barang',
   ];
}
