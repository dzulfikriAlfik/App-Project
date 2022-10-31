<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Video
 *
 * @property string $video_id
 * @property string $video_title
 * @property string $video_desc
 * @property string $video_link
 * @property string $video_source
 * @property string $video_subject
 * @property string $video_thumbnail
 * @property int $video_views
 * @property string $video_class
 * @property string $video_tag
 * @property int $video_approved
 * @property string $last_viewed
 * @property string $created_dt
 * @property string $created_by
 * @property string $updated_dt
 * @property string $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Video newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video query()
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereCreatedDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereLastViewed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereUpdatedDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereVideoApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereVideoClass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereVideoDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereVideoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereVideoLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereVideoSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereVideoSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereVideoTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereVideoThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereVideoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereVideoViews($value)
 * @mixin \Eloquent
 */
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
      'video_class',
      'video_tag',
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
