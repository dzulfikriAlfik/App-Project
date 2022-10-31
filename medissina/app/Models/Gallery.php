<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  use Uuids;
  protected $table        = 'gallery';
  protected $primaryKey   = 'id';
  public    $incrementing = false;
  public    $timestamps   = false;
  protected $guarded      = [];
}
