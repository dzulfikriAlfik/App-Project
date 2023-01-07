<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table      = "galery_kegiatan";
    protected $primaryKey = "id_galery_kegiatan";
    protected $guarded    = ["id_galery_kegiatan"];
}
