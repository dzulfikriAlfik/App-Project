<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProdukUnit
 *
 * @property int $id
 * @property string $nama
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukUnit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukUnit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukUnit query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukUnit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukUnit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukUnit whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdukUnit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProdukUnit extends Model
{
    use HasFactory;

    protected $table      = "produk_unit";
    protected $primaryKey = "id";
    protected $guarded    = ["id"];
}
