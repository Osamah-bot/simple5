<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Property
 * 
 * @property int $property_id
 * @property int $servive_id
 * @property string|null $property_name
 * 
 * @property ServiceType $service_type
 * @property Collection|Result[] $results
 *
 * @package App\Models
 */
class Property extends Model
{
	protected $table = 'property';
	protected $primaryKey = 'property_id';
	public $timestamps = false;

	protected $casts = [
		'servive_id' => 'int'
	];

	protected $fillable = [
		'servive_id',
		'property_name'
	];

	public function service_type()
	{
		return $this->belongsTo(ServiceType::class, 'servive_id');
	}

	public function results()
	{
		return $this->hasMany(Result::class);
	}
}
