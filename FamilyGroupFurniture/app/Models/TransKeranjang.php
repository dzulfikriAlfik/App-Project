<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TransKeranjang
 *
 * @property int $id
 * @property int $item_id
 * @property int $harga
 * @property int $kuantiti
 * @property int $diskon_item
 * @property int $total
 * @property int $kustomer_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TransKeranjang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransKeranjang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransKeranjang query()
 * @method static \Illuminate\Database\Eloquent\Builder|TransKeranjang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransKeranjang whereDiskonItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransKeranjang whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransKeranjang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransKeranjang whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransKeranjang whereKuantiti($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransKeranjang whereKustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransKeranjang whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransKeranjang whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TransKeranjang extends Model
{
    use HasFactory;

    protected $table      = "transaksi_keranjang";
    protected $primaryKey = "id";
    protected $guarded    = ["id"];
}
