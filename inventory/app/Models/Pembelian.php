<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
   use HasFactory;
   protected $fillable = [
      'no_po',
      // 'Tgl_po',
      'suplier',
      'kode_barang',
      'nama_barang',
      'satuan',
      'qty',
      'harga_satuan',
      // 'Total_harga',
   ];
}
