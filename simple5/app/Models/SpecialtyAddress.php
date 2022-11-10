<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SpecialtyAddress
 * 
 * @property int $specialty_address_id
 * @property string|null $specialty_country
 * @property string|null $specialty_city
 * @property string|null $specialty_zone
 * @property string|null $specialty_building
 * @property float|null $specialty_floor_no
 * @property float|null $specialty_apartment_no
 * @property string|null $specialty_description
 * 
 * @property Collection|Specialty[] $specialties
 *
 * @package App\Models
 */
class SpecialtyAddress extends Model
{
	protected $table = 'specialty_address';
	protected $primaryKey = 'specialty_address_id';
	public $timestamps = false;

	protected $casts = [
		'specialty_floor_no' => 'float',
		'specialty_apartment_no' => 'float'
	];

	protected $fillable = [
		'specialty_country',
		'specialty_city',
		'specialty_zone',
		'specialty_building',
		'specialty_floor_no',
		'specialty_apartment_no',
		'specialty_description'
	];

	public function specialties()
	{
		return $this->hasMany(Specialty::class);
	}
}
