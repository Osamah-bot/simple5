<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bill
 * 
 * @property int $billingid
 * @property int $accountant_id
 * @property int $review_id
 * @property Carbon $billing_date
 * @property Carbon $billing_time
 * @property float $discount
 * @property float $tax_amount
 * @property string $discount_reason
 * @property Carbon $discharge_time
 * @property Carbon $discharge_date
 * @property string|null $billing_state
 * 
 * @property Accountant $accountant
 * @property Review $review
 *
 * @package App\Models
 */
class Bill extends Model
{
	protected $table = 'bill';
	protected $primaryKey = 'billingid';
	public $timestamps = false;

	protected $casts = [
		'accountant_id' => 'int',
		'review_id' => 'int',
		'discount' => 'float',
		'tax_amount' => 'float'
	];

	protected $dates = [
		'billing_date',
		'billing_time',
		'discharge_time',
		'discharge_date'
	];

	protected $fillable = [
		'accountant_id',
		'review_id',
		'billing_date',
		'billing_time',
		'discount',
		'tax_amount',
		'discount_reason',
		'discharge_time',
		'discharge_date',
		'billing_state'
	];

	public function accountant()
	{
		return $this->belongsTo(Accountant::class);
	}

	public function review()
	{
		return $this->belongsTo(Review::class);
	}
}
