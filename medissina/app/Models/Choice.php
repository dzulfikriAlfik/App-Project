<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Choice
 *
 * @property string $choice_id
 * @property string $question_id
 * @property string $choice
 * @property string $created_dt
 * @property string|null $created_by
 * @property string $updated_dt
 * @property string|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Choice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Choice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Choice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereChoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereChoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereCreatedDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Choice whereUpdatedDt($value)
 * @mixin \Eloquent
 */
class Choice extends Model
{
   use HasFactory;
   use Uuids;
   protected $table = 'choice';
   protected $primaryKey = 'choice_id';
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
