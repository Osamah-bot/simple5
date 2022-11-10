<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('test', function(Blueprint $table)
		{
			$table->integer('test_id', true);
			$table->integer('servive_id')->index('fk_test_relations_service_');
			$table->integer('treatmentid')->index('fk_test_relations_laborato');
			$table->char('test_day', 10)->nullable();
			$table->dateTime('test_start_date')->nullable();
			$table->dateTime('test_end_date')->nullable();
			$table->string('test_status', 20)->nullable();
			$table->string('test_note', 200)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('test');
	}

}
