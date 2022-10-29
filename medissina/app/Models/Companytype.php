<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Uuids;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Companytype
 *
 * @property int $company_type_id
 * @property string $company_type
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|Companytype newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Companytype newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Companytype query()
 * @method static \Illuminate\Database\Eloquent\Builder|Companytype whereCompanyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Companytype whereCompanyTypeId($value)
 * @mixin \Eloquent
 */
class Companytype extends Model
{
  protected $table = 'company_type';
  protected $primaryKey = 'company_type_id';

  public function user()
  {
    return $this->hasMany(User::class);
  }
}
