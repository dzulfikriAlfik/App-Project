<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Audience
 *
 * @property string $id
 * @property string $survey_id
 * @property int $type_audience
 * @property string|null $created_by
 * @property string|null $created_dt
 * @property string|null $updated_by
 * @property string|null $updated_dt
 * @method static \Illuminate\Database\Eloquent\Builder|Audience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Audience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Audience query()
 * @method static \Illuminate\Database\Eloquent\Builder|Audience whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audience whereCreatedDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audience whereSurveyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audience whereTypeAudience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audience whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Audience whereUpdatedDt($value)
 * @mixin \Eloquent
 */
class Audience extends Model
{
   use HasFactory;
   use Uuids;
   protected $table = 'survey_target_audience';
   protected $primaryKey = 'id';
   public $incrementing = false;
   protected $guarded = [];

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
