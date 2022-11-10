<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Specialty
 *
 * @property int $specialty_id
 * @property int|null $specialty_address_id
 * @property string|null $specialty_name
 * @property Carbon|null $specialty_create_date
 * @property string|null $specialty_img
 * @property string|null $status
 *
 * @property SpecialtyAddress|null $specialty_address
 * @property Collection|Doctor[] $doctors
 *
 * @package App\Models
 */
class Specialty extends Model
{
	protected $table = 'specialty';
	protected $primaryKey = 'specialty_id';
	public $timestamps = false;

	protected $casts = [
		'specialty_address_id' => 'int'
	];

	protected $dates = [
		'specialty_create_date'
	];

	protected $fillable = [
		'specialty_address_id',
		'specialty_name',
        'specialty_description',
		'specialty_create_date',
		'specialty_img',
		'status'
	];

	public function specialty_address()
	{
		return $this->belongsTo(SpecialtyAddress::class);
	}

	public function doctors()
	{
		return $this->hasMany(Doctor::class);
	}
}
