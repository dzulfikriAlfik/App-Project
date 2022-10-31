<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukKeluar extends Model
{
   use HasFactory;
   protected $table = "produk_keluar";
   protected $guarded = [];

   public function pembelian()
   {
      return $this->belongsTo(Pembelian::class, 'pembelian_id');
   }
}
