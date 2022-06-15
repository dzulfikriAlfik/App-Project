<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang_keluar extends Model
{
    use HasFactory;
    protected $fillable = [
        'No_bon',
        'Tgl',
        'Kode_barang',
        'Nama_barang',
        'Satuan',
        'Qty',
        'Keterangan',
    ];
    
}
