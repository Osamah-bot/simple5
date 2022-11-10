<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PrescriptionMedcine
 * 
 * @property int $prescription_medcine_id
 * @property int $medicineid
 * @property int $treatmentid
 * @property string|null $notes
 * 
 * @property Medicine $medicine
 * @property Prescription $prescription
 *
 * @package App\Models
 */
class PrescriptionMedcine extends Model
{
	protected $table = 'prescription_medcine';
	protected $primaryKey = 'prescription_medcine_id';
	public $timestamps = false;

	protected $casts = [
		'medicineid' => 'int',
		'treatmentid' => 'int'
	];

	protected $fillable = [
		'medicineid',
		'treatmentid',
		'notes'
	];

	public function medicine()
	{
		return $this->belongsTo(Medicine::class, 'medicineid');
	}

	public function prescription()
	{
		return $this->belongsTo(Prescription::class, 'treatmentid');
	}
}
