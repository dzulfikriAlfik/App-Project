<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Question
 *
 * @property string $question_id
 * @property string $survey_id
 * @property string $question
 * @property int|null $question_point
 * @property int $is_required
 * @property int $question_type
 * @property string $created_dt
 * @property string|null $created_by
 * @property string $updated_dt
 * @property string|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereCreatedDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereIsRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestionPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereQuestionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereSurveyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Question whereUpdatedDt($value)
 * @mixin \Eloquent
 */
class Question extends Model
{
   use HasFactory;
   use Uuids;
   protected $table = 'question';
   protected $primaryKey = 'question_id';
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
