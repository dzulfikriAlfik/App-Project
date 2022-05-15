<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
   use Uuids;
   use HasFactory;
   protected $table = 'video';
   protected $primaryKey = 'video_id';
   public $incrementing = false;

   /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
      'video_id',
      'video_title',
      'video_desc',
      'video_link',
      'video_source',
      'video_subject',
      'video_thumbnail',
      'video_views',
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
