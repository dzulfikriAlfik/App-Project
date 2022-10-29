<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\System
 *
 * @property string $sys_id
 * @property string $sys_cat
 * @property string $sys_sub_cat
 * @property string $sys_cd
 * @property string $sys_val
 * @property string $remark
 * @property string $created_dt
 * @property string|null $created_by
 * @property string $updated_dt
 * @property string|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|System newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|System newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|System query()
 * @method static \Illuminate\Database\Eloquent\Builder|System whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|System whereCreatedDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|System whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|System whereSysCat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|System whereSysCd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|System whereSysId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|System whereSysSubCat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|System whereSysVal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|System whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|System whereUpdatedDt($value)
 * @mixin \Eloquent
 */
class System extends Model
{
    use Uuids;
    use HasFactory;
    protected $table = 'system';
    protected $primaryKey = 'sys_id';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sys_id',
        'sys_cat',
        'sys_sub_cat',
        'sys_cd',
        'sys_val',
        'remark',
        'created_by',
        'updated_by'
    ];

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
