<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProdukItem
 *
 * @property int $id
 * @property string|null $barcode
 * @property string $nama
 * @property int $kategori_id
 * @property int $unit_id
 * @property int $harga
 * @property int $stok
 * @property string|null $foto
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukItem whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukItem whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukItem whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukItem whereKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukItem whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukItem whereStok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukItem whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProdukItem extends Model
{
    use HasFactory;

    protected $table      = "produk_item";
    protected $primaryKey = "id";
    protected $guarded    = ["id"];
}
