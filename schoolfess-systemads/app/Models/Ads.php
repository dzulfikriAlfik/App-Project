<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use Uuids;
    use HasFactory;
    protected $table = 'ads';
    protected $primaryKey = 'ads_id';
    public $incrementing = false;
    protected $fillable = [
        "ads_id",
        "ads_title",
        "ads_desc",
        "ads_status",
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
