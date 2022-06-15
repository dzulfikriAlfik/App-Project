<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permintaan_produksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'No_permintaan',
        'Nama_suplier',
        'Tgl_permintaan',
        'Nama_barang',
        'Qty_barang',
        'Satuan_barang',
    ];
}
