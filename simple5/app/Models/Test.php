<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Test
 * 
 * @property int $test_id
 * @property int $servive_id
 * @property int $treatmentid
 * @property string|null $test_day
 * @property Carbon|null $test_start_date
 * @property Carbon|null $test_end_date
 * @property string|null $test_status
 * @property string|null $test_note
 * 
 * @property LaboratorySheet $laboratory_sheet
 * @property ServiceType $service_type
 * @property Collection|Result[] $results
 *
 * @package App\Models
 */
class Test extends Model
{
	protected $table = 'test';
	protected $primaryKey = 'test_id';
	public $timestamps = false;

	protected $casts = [
		'servive_id' => 'int',
		'treatmentid' => 'int'
	];

	protected $dates = [
		'test_start_date',
		'test_end_date'
	];

	protected $fillable = [
		'servive_id',
		'treatmentid',
		'test_day',
		'test_start_date',
		'test_end_date',
		'test_status',
		'test_note'
	];

	public function laboratory_sheet()
	{
		return $this->belongsTo(LaboratorySheet::class, 'treatmentid');
	}

	public function service_type()
	{
		return $this->belongsTo(ServiceType::class, 'servive_id');
	}

	public function results()
	{
		return $this->hasMany(Result::class);
	}
}
