<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransStok extends Model
{
    use HasFactory;

    protected $table      = "transaksi_stok";
    protected $primaryKey = "id";
    protected $guarded    = ["id"];
}
