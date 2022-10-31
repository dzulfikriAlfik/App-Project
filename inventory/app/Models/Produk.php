<?php

namespace App\Models;

use App\Models\Pembelian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
   use HasFactory;
   protected $table = "produk";
   protected $guarded = [];

   public function pembelian()
   {
      return $this->hasMany(Pembelian::class);
   }
}
