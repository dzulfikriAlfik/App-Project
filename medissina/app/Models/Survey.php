<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Survey
 *
 * @property string $survey_id
 * @property string $survey_title
 * @property string|null $survey_desc
 * @property int $total_audience
 * @property string|null $survey_img
 * @property int|null $total_budget
 * @property string|null $survey_start_date
 * @property string|null $survey_end_date
 * @property string $created_dt
 * @property string|null $created_by
 * @property string $updated_dt
 * @property string|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Survey newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Survey newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Survey query()
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereCreatedDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereSurveyDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereSurveyEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereSurveyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereSurveyImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereSurveyStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereSurveyTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereTotalAudience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereTotalBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Survey whereUpdatedDt($value)
 * @mixin \Eloquent
 */
class Survey extends Model
{
   use HasFactory;
   use Uuids;
   protected $table = 'survey';
   protected $primaryKey = 'survey_id';
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
