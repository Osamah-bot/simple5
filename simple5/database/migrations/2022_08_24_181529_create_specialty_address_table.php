<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialtyAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('specialty_address', function(Blueprint $table)
		{
			$table->integer('specialty_address_id', true);
			$table->string('specialty_country', 50)->nullable();
			$table->string('specialty_city', 50)->nullable();
			$table->string('specialty_zone', 50)->nullable();
			$table->string('specialty_building', 50)->nullable();
			$table->decimal('specialty_floor_no', 4, 0)->nullable();
			$table->decimal('specialty_apartment_no', 3, 0)->nullable();
			$table->string('specialty_description', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('specialty_address');
	}

}
