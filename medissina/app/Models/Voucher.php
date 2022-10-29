<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Voucher
 *
 * @property string $voucher_id
 * @property string $voucher_name
 * @property string $voucher_code
 * @property string|null $voucher_description
 * @property int $voucher_amount
 * @property string|null $voucher_amount_type
 * @property string $voucher_type
 * @property int|null $voucher_min_trans
 * @property int|null $voucher_quantity
 * @property int|null $voucher_used
 * @property string|null $voucher_created
 * @property string $voucher_expired
 * @property int|null $voucher_status
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereVoucherAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereVoucherAmountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereVoucherCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereVoucherCreated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereVoucherDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereVoucherExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereVoucherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereVoucherMinTrans($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereVoucherName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereVoucherQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereVoucherStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereVoucherType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereVoucherUsed($value)
 * @mixin \Eloquent
 */
class Voucher extends Model
{
   use HasFactory;
   use Uuids;
   protected $table = 'voucher';
   protected $primaryKey = 'voucher_id';
   public $incrementing = false;
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
