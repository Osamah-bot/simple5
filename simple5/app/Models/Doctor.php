<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Doctor
 *
 * @property int $doctor_id
 * @property int|null $account_id
 * @property int|null $specialty_id
 * @property string|null $fname
 * @property string|null $lname
 * @property float|null $mobile
 * @property string|null $email
 * @property Carbon|null $birth
 * @property string|null $gender
 * @property string $boodGroup
 * @property string|null $country
 * @property string|null $city
 * @property string|null $zone
 * @property string|null $img_url
 * @property float|null $monthly_sal
 * @property float|null $doctor_rate_salary
 *
 * @property Account|null $account
 * @property Specialty|null $specialty
 * @property Collection|Appointment[] $appointments
 * @property Collection|Schedule[] $schedules
 *
 * @package App\Models
 */
class Doctor extends Model
{
	protected $table = 'doctor';
	protected $primaryKey = 'doctor_id';
	public $timestamps = false;

	protected $casts = [
		'account_id' => 'int',
		'specialty_id' => 'int',
		'mobile' => 'float',
		'monthly_sal' => 'float',
		'doctor_rate_salary' => 'float'
	];

	protected $dates = [
		'birth'
	];

	protected $fillable = [
		'account_id',
		'specialty_id',
		'fname',
		'lname',
		'mobile',
		'email',
		'birth',
		'gender',
		'boodGroup',
		'country',
		'city',
		'zone',
		'img_url',
		'monthly_sal',
		'doctor_rate_salary'
	];

	public function account()
	{
		return $this->belongsTo(Account::class,'account_id');
	}

	public function specialty()
	{
		return $this->belongsTo(Specialty::class,'specialty_id');
	}

	public function appointments()
	{
		return $this->hasMany(Appointment::class,'doctor_id');
	}

	public function schedules()
	{
		return $this->belongsToMany(Schedule::class, 'doctor_schedule', 'doctor_id', 'chedule_id')
					->withPivot('doctor_schedule_id', 'review_id', 'book_available');
	}
}
