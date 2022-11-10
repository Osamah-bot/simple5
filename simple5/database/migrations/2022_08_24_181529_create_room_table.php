<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room', function(Blueprint $table)
		{
			$table->integer('room_id', true);
			$table->string('roomtype', 25)->nullable();
			$table->integer('roomno')->nullable();
			$table->integer('noofbeds')->nullable();
			$table->float('room_tariff', 10, 0)->nullable();
			$table->string('status', 10)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('room');
	}

}
