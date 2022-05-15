<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

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
