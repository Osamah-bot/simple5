<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Account
 *
 * @property int $account_id
 * @property string|null $account_type
 * @property string|null $email
 * @property string|null $password
 * @property Carbon|null $last_signed_on
 * @property Carbon|null $last_signed_out
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property bool|null $account_state
 *
 * @property Collection|Accountant[] $accountants
 * @property Collection|Admin[] $admins
 * @property Collection|Doctor[] $doctors
 * @property Collection|LabTechnician[] $lab_technicians
 * @property Collection|Patient[] $patients
 * @property Collection|Pharmacist[] $pharmacists
 * @property Collection|ResetPassword[] $reset_passwords
 *
 * @package App\Models
 */
class Account extends Authenticatable
{
	protected $table = 'account';
	protected $primaryKey = 'account_id';

	// protected $casts = [
	// 	'account_state' => 'bool'
	// ];

	protected $dates = [
		'last_signed_on',
		'last_signed_out'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'account_type',
		'email',
		'password',
		'last_signed_on',
		'last_signed_out',
		'remember_token',
		'account_state'
	];

	public function accountants()
	{
		return $this->hasMany(Accountant::class,'account_id');
	}

	public function admins()
	{
		return $this->hasMany(Admin::class,'account_id');

	}

	public function doctors()
	{
		return $this->hasMany(Doctor::class,'account_id');
	}

	public function lab_technicians()
	{
		return $this->hasMany(LabTechnician::class,'account_id');
	}

	public function patients()
	{
		return $this->hasMany(Patient::class,'account_id');
	}

	public function pharmacists()
	{
		return $this->hasMany(Pharmacist::class,'account_id');
	}

	public function reset_passwords()
	{
		return $this->hasMany(ResetPassword::class,'account_id');
	}
}
