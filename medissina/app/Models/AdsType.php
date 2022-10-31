<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\AdsPlatform;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\AdsType
 *
 * @property string $ads_type_id
 * @property string $ads_platform_id
 * @property string $ads_type_name
 * @property int $ads_type_width
 * @property int $ads_type_height
 * @property int $ads_type_price
 * @property string $ads_type_used
 * @property int $ads_type_status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ads[] $ads
 * @property-read int|null $ads_count
 * @property-read AdsPlatform|null $ads_platform
 * @method static \Illuminate\Database\Eloquent\Builder|AdsType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdsType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdsType query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdsType whereAdsPlatformId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdsType whereAdsTypeHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdsType whereAdsTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdsType whereAdsTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdsType whereAdsTypePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdsType whereAdsTypeStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdsType whereAdsTypeUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdsType whereAdsTypeWidth($value)
 * @mixin \Eloquent
 */
class AdsType extends Model
{
   use HasFactory;
   // use Uuids;
   protected $table = 'ads_type';
   protected $primaryKey = 'ads_type_id';
   public $incrementing = false;
   protected $guarded = [];

   public function ads_platform()
   {
      return $this->belongsTo(AdsPlatform::class, 'ads_platform_id', 'ads_platform_id');
   }

   public function ads()
   {
      return $this->hasMany(Ads::class, "ads_type", "ads_type_id");
   }

   public function getAdsTypePlatform($id = null)
   {
      $select = [
         'ads_type.ads_type_id',
         'ads_type.ads_platform_id',
         'ads_type.ads_type_name',
         'ads_type.ads_type_price',
         'ads_type.ads_type_used',
         'ads_type.ads_type_width',
         'ads_type.ads_type_height',
         'ads_type.ads_type_status',
         'ads_platform.ads_platform_id',
         'ads_platform.ads_platform_name as platform_name',
      ];

      if ($id != null) {
         $ads_type = DB::table('ads_type')
            ->join('ads_platform', 'ads_type.ads_platform_id', '=', 'ads_platform.ads_platform_id')
            ->select($select)->where("ads_type_id", '=', $id)
            ->where("ads_type_status", "!=", 0)
            ->first();
         // $ads_type_name = $ads_type->ads_type_name;
         if (!$ads_type) {
            return "Twitter";
         } else {
            return $ads_type->platform_name . " - " . $ads_type->ads_type_name;
         }
      }

      $ads_type = DB::table('ads_type')
         ->join('ads_platform', 'ads_type.ads_platform_id', '=', 'ads_platform.ads_platform_id')
         ->select($select)
         ->where("ads_type_status", "!=", 0)
         ->orderBy("ads_type.ads_platform_id", "DESC")
         ->get();

      return $ads_type;
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
