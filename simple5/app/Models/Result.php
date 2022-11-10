<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Result
 * 
 * @property int $result_id
 * @property int $test_id
 * @property int $property_id
 * @property string|null $result_value
 * 
 * @property Property $property
 * @property Test $test
 *
 * @package App\Models
 */
class Result extends Model
{
	protected $table = 'result';
	protected $primaryKey = 'result_id';
	public $timestamps = false;

	protected $casts = [
		'test_id' => 'int',
		'property_id' => 'int'
	];

	protected $fillable = [
		'test_id',
		'property_id',
		'result_value'
	];

	public function property()
	{
		return $this->belongsTo(Property::class);
	}

	public function test()
	{
		return $this->belongsTo(Test::class);
	}
}
