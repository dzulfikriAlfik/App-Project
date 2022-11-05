<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
  use Uuids;
  protected $table        = 'berita';
  protected $primaryKey   = 'id';
  public    $incrementing = false;
  public    $timestamps   = false;
  protected $guarded      = [];
}
