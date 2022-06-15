<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
   


{
    
    use HasFactory;
   protected $fillable = [
        'No_Penerimaan',
        'Kode',
        'Suplier',
        'Nama_Barang',
        'Satuan',
        'Qty_Po',
       'Qty_Penerimaan',
        'Keterangan',
        'No_po',
            
    ];
    
}
