<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\AdsType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Topup
 *
 * @property int $id
 * @property string|null $voucher_id
 * @property string|null $voucher_type
 * @property int|null $voucher_amt
 * @property int $topup_amt
 * @property int $pay_amt
 * @property string $user_id
 * @property string $topup_status
 * @property string $created
 * @property string $invoice_id
 * @property string|null $paid_time
 * @property string|null $invoice_url
 * @method static \Illuminate\Database\Eloquent\Builder|Topup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Topup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Topup query()
 * @method static \Illuminate\Database\Eloquent\Builder|Topup whereCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topup whereInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topup whereInvoiceUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topup wherePaidTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topup wherePayAmt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topup whereTopupAmt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topup whereTopupStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topup whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topup whereVoucherAmt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topup whereVoucherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topup whereVoucherType($value)
 * @mixin \Eloquent
 */
class Topup extends Model
{
   // use Uuids;
   use HasFactory;
   protected $table = 'topup';
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
