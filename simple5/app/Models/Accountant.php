<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Accountant
 * 
 * @property int $accountant_id
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
 * @property Collection|Bill[] $bills
 *
 * @package App\Models
 */
class Accountant extends Model
{
	protected $table = 'accountant';
	protected $primaryKey = 'accountant_id';
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

	public function bills()
	{
		return $this->hasMany(Bill::class);
	}
}
