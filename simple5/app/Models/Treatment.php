<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Treatment
 * 
 * @property int $treatmentid
 * @property int $review_id
 * @property string $treatmenttype
 * 
 * @property Review $review
 * @property LaboratorySheet $laboratory_sheet
 * @property Prescription $prescription
 *
 * @package App\Models
 */
class Treatment extends Model
{
	protected $table = 'treatment';
	protected $primaryKey = 'treatmentid';
	public $timestamps = false;

	protected $casts = [
		'review_id' => 'int'
	];

	protected $fillable = [
		'review_id',
		'treatmenttype'
	];

	public function review()
	{
		return $this->belongsTo(Review::class);
	}

	public function laboratory_sheet()
	{
		return $this->hasOne(LaboratorySheet::class, 'treatmentid');
	}

	public function prescription()
	{
		return $this->hasOne(Prescription::class, 'treatmentid');
	}
}
