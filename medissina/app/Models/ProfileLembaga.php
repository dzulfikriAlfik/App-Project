<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class ProfileLembaga extends Model
{
  use Uuids;
  protected $table        = 'profile_lembaga';
  protected $primaryKey   = 'id';
  public    $incrementing = false;
  public    $timestamps   = false;
  protected $guarded      = [];
}
