<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Prescription
 * 
 * @property int $treatmentid
 * @property int $pharmacist_id
 * @property Carbon $prescription_date
 * @property string $status
 * 
 * @property Treatment $treatment
 * @property Pharmacist $pharmacist
 * @property Collection|PrescriptionMedcine[] $prescription_medcines
 *
 * @package App\Models
 */
class Prescription extends Model
{
	protected $table = 'prescription';
	protected $primaryKey = 'treatmentid';
	public $timestamps = false;

	protected $casts = [
		'pharmacist_id' => 'int'
	];

	protected $dates = [
		'prescription_date'
	];

	protected $fillable = [
		'pharmacist_id',
		'prescription_date',
		'status'
	];

	public function treatment()
	{
		return $this->belongsTo(Treatment::class, 'treatmentid');
	}

	public function pharmacist()
	{
		return $this->belongsTo(Pharmacist::class);
	}

	public function prescription_medcines()
	{
		return $this->hasMany(PrescriptionMedcine::class, 'treatmentid');
	}
}
