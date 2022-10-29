<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Trivia
 *
 * @property int $trivia_id
 * @property string $trivia_text
 * @property int $trivia_views
 * @property string $created_dt
 * @property string $created_by
 * @property string $updated_dt
 * @property string $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Trivia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trivia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trivia query()
 * @method static \Illuminate\Database\Eloquent\Builder|Trivia whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trivia whereCreatedDt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trivia whereTriviaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trivia whereTriviaText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trivia whereTriviaViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trivia whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trivia whereUpdatedDt($value)
 * @mixin \Eloquent
 */
class Trivia extends Model
{
    protected $primaryKey = 'trivia_id';
    protected $fillable = [
        'trivia_id', 'trivia_text', 'created_by', 'updated_by'
    ];
    public $timestamps = false;
}
