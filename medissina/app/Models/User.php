<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Traits\Uuids;
use App\Models\Companytype;

/**
 * App\Models\User
 *
 * @property string $user_id
 * @property int|null $level_id
 * @property string $user_name
 * @property string $user_password
 * @property string|null $user_last_reset_pwd
 * @property string|null $user_bio
 * @property string $user_email
 * @property string|null $user_phone
 * @property string|null $user_username
 * @property string|null $user_company
 * @property string|null $user_company_type
 * @property string|null $user_status
 * @property int|null $user_cnt_redcard
 * @property string $created_dt
 * @property string $updated_dt
 * @property int|null $user_verified
 * @property int $user_wa_verified
 * @property string|null $user_image
 * @property int|null $user_cnt_love
 * @property int|null $user_firstcolumn
 * @property int|null $user_isprivate
 * @property string|null $user_device_key
 * @property string|null $user_token
 * @property string|null $user_token_exp
 * @property string|null $user_last_login
 * @property int $user_koin
 * @property string|null $user_cd_verif
 * @property int $user_banned
 * @property string|null $user_banned_reason
 * @property string|null $user_role
 * @property string|null $user_point
 * @property string|null $user_province
 * @property string|null $user_regency
 * @property string|null $user_agreement
 * @property string|null $user_school
 * @property int $user_cnt_upd_sch
 * @property string $user_notif
 * @property string $id_sekolah
 * @property int|null $user_birthyear
 * @property int $user_saldo
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdSekolah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLevelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserAgreement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserBanned($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserBannedReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserBirthyear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserCdVerif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserCntLove($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserCntRedcard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserCntUpdSch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserCompanyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserDeviceKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserFirstcolumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserIsprivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserKoin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserLastResetPwd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserNotif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserRegency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserSaldo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserSchool($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserTokenExp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserWaVerified($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements JWTSubject
{
  use Uuids;
  use HasApiTokens, HasFactory, Notifiable;
  protected $table = 'users';
  protected $primaryKey = 'user_id';
  public $incrementing = false;


  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $guarded = [];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
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

  /*
    public function perdas()
    {
        return $this->hasMany(Perda::class);
    }
    public function sys()
    {
        return $this->hasMany(System::class);
    }
    */
  public $timestamps = false;
}
