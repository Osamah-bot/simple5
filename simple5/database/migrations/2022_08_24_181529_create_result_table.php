<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('result', function(Blueprint $table)
		{
			$table->integer('result_id', true);
			$table->integer('test_id')->index('fk_result_relations_test');
			$table->integer('property_id')->index('fk_result_relations_property');
			$table->string('result_value', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('result');
	}

}
