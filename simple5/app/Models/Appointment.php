<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Appointment
 *
 * @property int $appo_id
 * @property int|null $doctor_id
 * @property int $patient_id
 * @property string|null $reason
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $status
 *
 * @property Doctor|null $doctor
 * @property Patient $patient
 * @property Collection|Review[] $reviews
 *
 * @package App\Models
 */
class Appointment extends Model
{
	protected $table = 'appointment';
	protected $primaryKey = 'appo_id';

	protected $casts = [
		'doctor_id' => 'int',
		'patient_id' => 'int'
	];

	protected $fillable = [
		'doctor_id',
		'patient_id',
		'reason',
		'status'
	];

	public function doctor()
	{
		return $this->belongsTo(Doctor::class,'doctor_id');
	}

	public function patient()
	{
		return $this->belongsTo(Patient::class,'patient_id');
	}

	public function reviews()
	{
		return $this->hasMany(Review::class, 'appo_id');
	}
}
