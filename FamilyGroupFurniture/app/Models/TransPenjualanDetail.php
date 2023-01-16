<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransPenjualanDetail extends Model
{
    use HasFactory;

    protected $table      = "transaksi_penjualan_detail";
    protected $primaryKey = "id";
    protected $guarded    = ["id"];
}
