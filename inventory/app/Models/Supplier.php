<?php

namespace App\Models;

use App\Models\Pembelian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
   use HasFactory;
   protected $table = "supplier";
   protected $primaryKey = "supplier_id";
   protected $guarded = [];

   public function pembelian()
   {
      return $this->hasMany(Pembelian::class, 'supplier_id', 'supplier_id');
   }
}
