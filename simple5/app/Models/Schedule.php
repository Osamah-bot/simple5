<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Schedule
 * 
 * @property int $chedule_id
 * @property string|null $day_
 * @property Carbon|null $date_
 * @property Carbon|null $start_time
 * @property Carbon|null $end_time
 * 
 * @property Collection|Doctor[] $doctors
 *
 * @package App\Models
 */
class Schedule extends Model
{
	protected $table = 'schedule';
	protected $primaryKey = 'chedule_id';
	public $timestamps = false;

	protected $dates = [
		'date_',
		'start_time',
		'end_time'
	];

	protected $fillable = [
		'day_',
		'date_',
		'start_time',
		'end_time'
	];

	public function doctors()
	{
		return $this->belongsToMany(Doctor::class, 'doctor_schedule', 'chedule_id')
					->withPivot('doctor_schedule_id', 'review_id', 'book_available');
	}
}
