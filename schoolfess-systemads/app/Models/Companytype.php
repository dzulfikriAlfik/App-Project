<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuids;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Companytype extends Model
{
    protected $table = 'company_type';
    protected $primaryKey = 'company_type_id';

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
