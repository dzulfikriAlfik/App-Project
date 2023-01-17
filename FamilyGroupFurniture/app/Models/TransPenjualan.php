<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TransPenjualan
 *
 * @property int $id
 * @property string $invoice
 * @property int $kustomer_id
 * @property int $subtotal_harga
 * @property int $diskon
 * @property int $total_harga
 * @property int $bayar
 * @property int $sisa_bayar
 * @property string $catatan
 * @property string $tanggal
 * @property int $admin_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualan query()
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualan whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualan whereBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualan whereCatatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualan whereDiskon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualan whereInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualan whereKustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualan whereSisaBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualan whereSubtotalHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualan whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualan whereTotalHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransPenjualan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TransPenjualan extends Model
{
    use HasFactory;

    protected $table      = "transaksi_penjualan";
    protected $primaryKey = "id";
    protected $guarded    = ["id"];
}
