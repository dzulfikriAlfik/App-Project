<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

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
