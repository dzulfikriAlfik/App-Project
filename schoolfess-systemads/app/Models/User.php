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

class User extends Authenticatable implements JWTSubject
{
    use Uuids;
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $incrementing = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'user_name',
        'user_username',
        'user_email',
        'user_company',
        'user_company_type',
        'user_status',
        'user_password',
        'user_token',
        'user_banned',
        'user_phone',
        'created_dt',
        'user_role'
    ];

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
