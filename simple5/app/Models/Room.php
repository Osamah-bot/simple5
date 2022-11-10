<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Room
 * 
 * @property int $room_id
 * @property string|null $roomtype
 * @property int|null $roomno
 * @property int|null $noofbeds
 * @property float|null $room_tariff
 * @property string|null $status
 * 
 * @property Collection|Review[] $reviews
 *
 * @package App\Models
 */
class Room extends Model
{
	protected $table = 'room';
	protected $primaryKey = 'room_id';
	public $timestamps = false;

	protected $casts = [
		'roomno' => 'int',
		'noofbeds' => 'int',
		'room_tariff' => 'float'
	];

	protected $fillable = [
		'roomtype',
		'roomno',
		'noofbeds',
		'room_tariff',
		'status'
	];

	public function reviews()
	{
		return $this->hasMany(Review::class);
	}
}
