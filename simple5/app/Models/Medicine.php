<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Medicine
 * 
 * @property int $medicineid
 * @property string $medicinename
 * @property string|null $quantity
 * @property float $medicinecost
 * @property string $description
 * @property string $status
 * @property string|null $medicine_img_url
 * 
 * @property Collection|PrescriptionMedcine[] $prescription_medcines
 *
 * @package App\Models
 */
class Medicine extends Model
{
	protected $table = 'medicine';
	protected $primaryKey = 'medicineid';
	public $timestamps = false;

	protected $casts = [
		'medicinecost' => 'float'
	];

	protected $fillable = [
		'medicinename',
		'quantity',
		'medicinecost',
		'description',
		'status',
		'medicine_img_url'
	];

	public function prescription_medcines()
	{
		return $this->hasMany(PrescriptionMedcine::class, 'medicineid');
	}
}
