<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Traits\Uuids;

/**
 * App\Models\User
 *
 * @property string $user_id
 * @property string $user_name
 * @property string $user_username
 * @property string $user_email
 * @property string $user_phone
 * @property string $user_password
 * @property string|null $user_role
 * @property int $user_status
 * @property string $user_birthdate
 * @property string|null $user_image
 * @property string|null $user_detail_address
 * @property string|null $user_RT
 * @property string|null $user_RW
 * @property string $user_village
 * @property string $user_district
 * @property string $user_regency
 * @property string $user_province
 * @property string $created_date
 * @property string|null $created_by
 * @property string $updated_date
 * @property string|null $updated_by
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserDetailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserRT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserRW($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserRegency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserVillage($value)
 * @mixin \Eloquent
 */
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
