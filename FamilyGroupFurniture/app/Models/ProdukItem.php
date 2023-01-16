<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukItem extends Model
{
    use HasFactory;

    protected $table      = "produk_item";
    protected $primaryKey = "id";
    protected $guarded    = ["id"];
}
