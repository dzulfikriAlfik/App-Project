<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TransStok
 *
 * @property int $id
 * @property int $item_id
 * @property string $time
 * @property string $keterangan
 * @property int $admin_id
 * @property int $kuantiti
 * @property string $tanggal
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TransStok newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransStok newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransStok query()
 * @method static \Illuminate\Database\Eloquent\Builder|TransStok whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransStok whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransStok whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransStok whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransStok whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransStok whereKuantiti($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransStok whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransStok whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransStok whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TransStok extends Model
{
    use HasFactory;

    protected $table      = "transaksi_stok";
    protected $primaryKey = "id";
    protected $guarded    = ["id"];
}
