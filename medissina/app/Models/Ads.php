<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\AdsType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Ads
 *
 * @property string $ads_id
 * @property string|null $ads_title
 * @property string|null $ads_desc
 * @property string $ads_link
 * @property AdsType|null $ads_type
 * @property string $ads_view
 * @property string $ads_click
 * @property string|null $ads_image
 * @property int $ads_status
 * @property int $ads_quantity
 * @property string|null $reject_reason
 * @property string|null $suspend_reason
 * @property string $ads_placement
 * @property string $ads_start_date
 * @property string $ads_end_date
 * @property string|null $approved_dt
 * @property string|null $created_dt
 * @property string $created_by
 * @property string $updated_dt
 * @property string $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Ads newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ads newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ads query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereAdsClick($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereAdsDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereAdsEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereAdsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereAdsImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereAdsLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereAdsPlacement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereAdsQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereAdsStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereAdsStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereAdsTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereAdsType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereAdsView($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereApprovedDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereCreatedDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereRejectReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereSuspendReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereUpdatedDt($value)
 * @mixin \Eloquent
 */
class Ads extends Model
{
   use Uuids;
   use HasFactory;
   protected $table = 'ads';
   protected $primaryKey = 'ads_id';
   public $incrementing = false;
   // protected $fillable = [
   //    "ads_id",
   //    "ads_title",
   //    "ads_desc",
   //    "ads_link",
   //    "ads_type",
   //    "ads_type",
   //    "ads_view",
   //    "ads_click",
   //    "ads_image",
   //    "ads_status",
   //    "reject_reason",
   //    "suspend_reason",
   //    "ads_placement",
   //    "ads_start_date",
   //    "ads_end_date",
   //    "approved_dt",
   //    "created_dt",
   //    "created_by",
   //    "updated_dt",
   //    "updated_by",
   // ];
   protected $guarded = [];

   public function ads_type()
   {
      return $this->belongsTo(AdsType::class, "ads_type_id", "ads_type_id");
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
