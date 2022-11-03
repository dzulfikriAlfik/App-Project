<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Masukan extends Model
{
  use Uuids;
  protected $table        = 'masukan';
  protected $primaryKey   = 'id';
  public    $incrementing = false;
  public    $timestamps   = false;
  protected $guarded      = [];
}
