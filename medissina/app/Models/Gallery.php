<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Gallery
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string|null $activity_id
 * @property string $gallery_date
 * @property string $created_date
 * @property string|null $created_by
 * @property string $updated_date
 * @property string $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCreatedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereGalleryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereUpdatedDate($value)
 * @mixin \Eloquent
 */
class Gallery extends Model
{
  use Uuids;
  protected $table        = 'gallery';
  protected $primaryKey   = 'id';
  public    $incrementing = false;
  public    $timestamps   = false;
  protected $guarded      = [];
}
