<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DoctorSchedule
 * 
 * @property int $doctor_schedule_id
 * @property int $doctor_id
 * @property int $chedule_id
 * @property int|null $review_id
 * @property string|null $book_available
 * 
 * @property Review|null $review
 * @property Doctor $doctor
 * @property Schedule $schedule
 *
 * @package App\Models
 */
class DoctorSchedule extends Model
{
	protected $table = 'doctor_schedule';
	protected $primaryKey = 'doctor_schedule_id';
	public $timestamps = false;

	protected $casts = [
		'doctor_id' => 'int',
		'chedule_id' => 'int',
		'review_id' => 'int'
	];

	protected $fillable = [
		'doctor_id',
		'chedule_id',
		'review_id',
		'book_available'
	];

	public function review()
	{
		return $this->belongsTo(Review::class);
	}

	public function doctor()
	{
		return $this->belongsTo(Doctor::class);
	}

	public function schedule()
	{
		return $this->belongsTo(Schedule::class, 'chedule_id');
	}
}
