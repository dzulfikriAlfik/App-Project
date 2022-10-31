<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukMasuk extends Model
{
   use HasFactory;
   protected $table = "produk_masuk";
   protected $guarded = [];

   public function pembelian()
   {
      return $this->belongsTo(Pembelian::class, 'pembelian_id');
   }
}
