<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceType
 * 
 * @property int $servive_id
 * @property string|null $service_name
 * @property string|null $service_notes
 * @property float|null $service_cost
 * 
 * @property Collection|Property[] $properties
 * @property Collection|Test[] $tests
 *
 * @package App\Models
 */
class ServiceType extends Model
{
	protected $table = 'service_type';
	protected $primaryKey = 'servive_id';
	public $timestamps = false;

	protected $casts = [
		'service_cost' => 'float'
	];

	protected $fillable = [
		'service_name',
		'service_notes',
		'service_cost'
	];

	public function properties()
	{
		return $this->hasMany(Property::class, 'servive_id');
	}

	public function tests()
	{
		return $this->hasMany(Test::class, 'servive_id');
	}
}
