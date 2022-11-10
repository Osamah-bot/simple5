<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('test', function(Blueprint $table)
		{
			$table->foreign('treatmentid', 'fk_test_relations_laborato')->references('treatmentid')->on('laboratory_sheet')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('servive_id', 'fk_test_relations_service_')->references('servive_id')->on('service_type')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('test', function(Blueprint $table)
		{
			$table->dropForeign('fk_test_relations_laborato');
			$table->dropForeign('fk_test_relations_service_');
		});
	}

}
