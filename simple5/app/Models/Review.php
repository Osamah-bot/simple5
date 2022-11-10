<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Review
 * 
 * @property int $review_id
 * @property int|null $room_id
 * @property int|null $appo_id
 * @property string|null $review_reason
 * @property string|null $review_state
 * @property Carbon|null $review_date
 * 
 * @property Appointment|null $appointment
 * @property Room|null $room
 * @property Collection|Alert[] $alerts
 * @property Collection|Bill[] $bills
 * @property Collection|DoctorSchedule[] $doctor_schedules
 * @property Collection|Treatment[] $treatments
 *
 * @package App\Models
 */
class Review extends Model
{
	protected $table = 'review';
	protected $primaryKey = 'review_id';
	public $timestamps = false;

	protected $casts = [
		'room_id' => 'int',
		'appo_id' => 'int'
	];

	protected $dates = [
		'review_date'
	];

	protected $fillable = [
		'room_id',
		'appo_id',
		'review_reason',
		'review_state',
		'review_date'
	];

	public function appointment()
	{
		return $this->belongsTo(Appointment::class, 'appo_id');
	}

	public function room()
	{
		return $this->belongsTo(Room::class);
	}

	public function alerts()
	{
		return $this->hasMany(Alert::class);
	}

	public function bills()
	{
		return $this->hasMany(Bill::class);
	}

	public function doctor_schedules()
	{
		return $this->hasMany(DoctorSchedule::class);
	}

	public function treatments()
	{
		return $this->hasMany(Treatment::class);
	}
}
