<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukUnit extends Model
{
    use HasFactory;

    protected $table      = "produk_unit";
    protected $primaryKey = "id";
    protected $guarded    = ["id"];
}
