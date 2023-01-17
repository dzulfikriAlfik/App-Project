<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProdukKategori
 *
 * @property int $id
 * @property string $nama
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukKategori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukKategori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukKategori query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukKategori whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukKategori whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukKategori whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukKategori whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProdukKategori extends Model
{
    use HasFactory;

    protected $table      = "produk_kategori";
    protected $primaryKey = "id";
    protected $guarded    = ["id"];
}
