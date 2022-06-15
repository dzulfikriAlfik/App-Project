<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'Kode_barang',
        'Nama_barang',
        'Harga_barang',
    ];
  
}
