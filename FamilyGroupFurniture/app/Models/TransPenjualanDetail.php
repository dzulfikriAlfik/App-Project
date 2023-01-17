<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TransPenjualanDetail
 *
 * @property int $id
 * @property int $penjualan_id
 * @property int $item_id
 * @property int $harga
 * @property int $kuantiti
 * @property int $diskon_satuan
 * @property int $total_harga
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualanDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualanDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualanDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualanDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualanDetail whereDiskonSatuan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualanDetail whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualanDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualanDetail whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualanDetail whereKuantiti($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualanDetail wherePenjualanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualanDetail whereTotalHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualanDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TransPenjualanDetail extends Model
{
    use HasFactory;

    protected $table      = "transaksi_penjualan_detail";
    protected $primaryKey = "id";
    protected $guarded    = ["id"];
}
