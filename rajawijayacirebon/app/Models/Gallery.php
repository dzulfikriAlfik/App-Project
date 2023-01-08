<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  use HasFactory;

  protected $table      = "gallery";
  protected $guarded    = ["id"];
  public    $timestamps = false;
}
