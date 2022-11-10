<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Alert
 * 
 * @property int $alert_id
 * @property int $review_id
 * @property string|null $alert_message
 * @property Carbon $alert_date
 * 
 * @property Review $review
 *
 * @package App\Models
 */
class Alert extends Model
{
	protected $table = 'alert';
	protected $primaryKey = 'alert_id';
	public $timestamps = false;

	protected $casts = [
		'review_id' => 'int'
	];

	protected $dates = [
		'alert_date'
	];

	protected $fillable = [
		'review_id',
		'alert_message',
		'alert_date'
	];

	public function review()
	{
		return $this->belongsTo(Review::class);
	}
}
