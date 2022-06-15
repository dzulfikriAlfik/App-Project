<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeluaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nama_Toko', 
        'No_Surat_jalan', 
        'Alamat_Toko',  
        'Nama_Barang',  
        'Qty',  
        'Keterangan',
        'Harga_Satuan',
        'Jumlah_Total',
        
    ];
}
