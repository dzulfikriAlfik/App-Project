<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsType extends Model
{
   use HasFactory;
   protected $table = 'ads_type';
   protected $primaryKey = 'ads_type_id';
   protected $fillable = [
      "ads_type_name",
      "ads_type_width",
      "ads_type_height",
      "ads_type_status"
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
