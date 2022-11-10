<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Patient
 * 
 * @property int $patient_id
 * @property int|null $patient_wait_code
 * @property string|null $patient_bar_code
 * @property int|null $account_id
 * @property string|null $fname
 * @property string|null $lname
 * @property float|null $mobile
 * @property string|null $email
 * @property Carbon|null $birth
 * @property string|null $gender
 * @property string|null $country
 * @property string|null $city
 * @property string|null $zone
 * @property string|null $img_url
 * @property string $boodGroup
 * 
 * @property Account|null $account
 * @property Collection|Appointment[] $appointments
 *
 * @package App\Models
 */
class Patient extends Model
{
	protected $table = 'patient';
	protected $primaryKey = 'patient_id';
	public $timestamps = false;

	protected $casts = [
		'patient_wait_code' => 'int',
		'account_id' => 'int',
		'mobile' => 'float'
	];

	protected $dates = [
		'birth'
	];

	protected $fillable = [
		'patient_wait_code',
		'patient_bar_code',
		'account_id',
		'fname',
		'lname',
		'mobile',
		'email',
		'birth',
		'gender',
		'country',
		'city',
		'zone',
		'img_url',
		'boodGroup'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}

	public function appointments()
	{
		return $this->hasMany(Appointment::class);
	}
}
