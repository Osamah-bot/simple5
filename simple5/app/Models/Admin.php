<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Admin
 * 
 * @property int $admin_id
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
 * 
 * @property Account|null $account
 *
 * @package App\Models
 */
class Admin extends Model
{
	protected $table = 'admin';
	protected $primaryKey = 'admin_id';
	public $timestamps = false;

	protected $casts = [
		'account_id' => 'int',
		'mobile' => 'float'
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
		'img_url'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}
}
