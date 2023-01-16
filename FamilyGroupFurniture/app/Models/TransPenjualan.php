<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransPenjualan extends Model
{
    use HasFactory;

    protected $table      = "transaksi_penjualan";
    protected $primaryKey = "id";
    protected $guarded    = ["id"];
}
