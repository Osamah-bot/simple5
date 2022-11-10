<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_type', function(Blueprint $table)
		{
			$table->integer('servive_id', true);
			$table->string('service_name', 50)->nullable();
			$table->string('service_notes', 200)->nullable();
			$table->float('service_cost', 10, 0)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('service_type');
	}

}
