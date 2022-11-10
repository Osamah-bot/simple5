<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LaboratorySheet
 * 
 * @property int $treatmentid
 * @property int|null $lab_technician_id
 * @property Carbon $laboratory_date
 * 
 * @property Treatment $treatment
 * @property LabTechnician|null $lab_technician
 * @property Collection|Test[] $tests
 *
 * @package App\Models
 */
class LaboratorySheet extends Model
{
	protected $table = 'laboratory_sheet';
	protected $primaryKey = 'treatmentid';
	public $timestamps = false;

	protected $casts = [
		'lab_technician_id' => 'int'
	];

	protected $dates = [
		'laboratory_date'
	];

	protected $fillable = [
		'lab_technician_id',
		'laboratory_date'
	];

	public function treatment()
	{
		return $this->belongsTo(Treatment::class, 'treatmentid');
	}

	public function lab_technician()
	{
		return $this->belongsTo(LabTechnician::class);
	}

	public function tests()
	{
		return $this->hasMany(Test::class, 'treatmentid');
	}
}
