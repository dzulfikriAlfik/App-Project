<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $table      = "company_profile";
    protected $primaryKey = "id_company";
    protected $guarded    = ["id_company"];
}
