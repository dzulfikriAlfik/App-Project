<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Traits\Uuids;

class User extends Authenticatable implements JWTSubject
{
  use Uuids;
  use HasApiTokens, HasFactory, Notifiable;
  protected $table        = 'users';
  protected $primaryKey   = 'user_id';
  public    $incrementing = false;
  public    $timestamps   = false;
  protected $guarded      = [];
  protected $hidden       = [
    'user_password'
  ];

  public function getJWTIdentifier()
  {
    return $this->getKey();
  }
  public function getJWTCustomClaims()
  {
    return [];
  }
}
