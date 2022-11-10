<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToResultTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('result', function(Blueprint $table)
		{
			$table->foreign('property_id', 'fk_result_relations_property')->references('property_id')->on('property')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('test_id', 'fk_result_relations_test')->references('test_id')->on('test')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('result', function(Blueprint $table)
		{
			$table->dropForeign('fk_result_relations_property');
			$table->dropForeign('fk_result_relations_test');
		});
	}

}
