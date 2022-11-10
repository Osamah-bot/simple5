<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LabTechnician
 * 
 * @property int $lab_technician_id
 * @property int|null $account_id
 * @property string|null $fname
 * @property string|null $lname
 * @property float|null $mobile
 * @property string|null $email
 * @property Carbon|null $birth
 * @property string|null $country
 * @property string|null $city
 * @property string|null $zone
 * @property string|null $img_url
 * @property float|null $monthly_sal
 * 
 * @property Account|null $account
 * @property Collection|LaboratorySheet[] $laboratory_sheets
 *
 * @package App\Models
 */
class LabTechnician extends Model
{
	protected $table = 'lab_technician';
	protected $primaryKey = 'lab_technician_id';
	public $timestamps = false;

	protected $casts = [
		'account_id' => 'int',
		'mobile' => 'float',
		'monthly_sal' => 'float'
	];

	protected $dates = [
		'birth'
	];

	protected $fillable = [
		'account_id',
		'fname',
		'lname',
		'mobile',
		'email',
		'birth',
		'country',
		'city',
		'zone',
		'img_url',
		'monthly_sal'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}

	public function laboratory_sheets()
	{
		return $this->hasMany(LaboratorySheet::class);
	}
}
