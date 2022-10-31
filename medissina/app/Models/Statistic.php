<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Statistic
 *
 * @property string $stat_id
 * @property string|null $stat_date
 * @property string|null $stat_code
 * @property string|null $stat_val
 * @property string $created_dt
 * @property string|null $created_by
 * @property string $updated_dt
 * @property string|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereCreatedDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereStatCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereStatDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereStatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereStatVal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereUpdatedDt($value)
 * @mixin \Eloquent
 */
class Statistic extends Model
{
    use Uuids;
    use HasFactory;
    protected $table = 'statistics';
    protected $primaryKey = 'stat_id';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'stat_id',
        'stat_date',
        'stat_code',
        'stat_val',
        'created_by',
        'updated_by'
    ];

    public $timestamps = false;
}
