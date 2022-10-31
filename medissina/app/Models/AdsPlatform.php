<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\AdsType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\AdsPlatform
 *
 * @property string $ads_platform_id
 * @property string $ads_platform_name
 * @property int $ads_platform_status
 * @property-read \Illuminate\Database\Eloquent\Collection|AdsType[] $ads_type
 * @property-read int|null $ads_type_count
 * @method static \Illuminate\Database\Eloquent\Builder|AdsPlatform newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdsPlatform newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdsPlatform query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdsPlatform whereAdsPlatformId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdsPlatform whereAdsPlatformName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdsPlatform whereAdsPlatformStatus($value)
 * @mixin \Eloquent
 */
class AdsPlatform extends Model
{
   use HasFactory;
   use Uuids;
   protected $table = 'ads_platform';
   protected $primaryKey = 'ads_platform_id';
   public $incrementing = false;
   protected $guarded = [];

   public function ads_type()
   {
      return $this->hasMany(AdsType::class, 'ads_platform_id', 'ads_platform_id');
   }

   public function getJWTIdentifier()
   {
      return $this->getKey();
   }

   public function getJWTCustomClaims()
   {
      return [];
   }

   public $timestamps = false;
}
