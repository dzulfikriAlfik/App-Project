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
      "ads_link",
      "ads_view",
      "ads_click",
      "ads_image",
      "ads_status",
      "ads_placement",
      "ads_start_date",
      "ads_end_date",
      "created_dt",
      "created_by",
      "updated_dt",
      "updated_by",
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
