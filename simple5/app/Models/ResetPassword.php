<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ResetPassword
 * 
 * @property int $reset_id
 * @property int $account_id
 * @property string|null $token
 * @property Carbon|null $created_at
 * 
 * @property Account $account
 *
 * @package App\Models
 */
class ResetPassword extends Model
{
	protected $table = 'reset_password';
	protected $primaryKey = 'reset_id';
	public $timestamps = false;

	protected $casts = [
		'account_id' => 'int'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'account_id',
		'token'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}
}
