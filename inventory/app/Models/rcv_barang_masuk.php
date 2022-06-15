<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rcv_barang_masuk extends Model
{
    use HasFactory;
    protected $fillable = [
        'No_po',
        'Tgl_po',
        'Nama_suplier',
        'Tgl_rcv',
        'No_rcv',
        'Kode_barang',
        'Nama_barang',
        'Qty_po',
        'Qty_rcv',
        'Satuan',
        'Keterangan',
        
    ];
}
