<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelian extends Model
{
   use HasFactory;
   protected $table = "pembelian";
   protected $guarded = [];

   public function produk()
   {
      return $this->belongsTo(Produk::class);
   }

   public function supplier()
   {
      return $this->belongsTo(Supplier::class, 'supplier_id', 'supplier_id');
   }
}
