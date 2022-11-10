<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSpecialtyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('specialty', function(Blueprint $table)
		{
			$table->foreign('specialty_address_id', 'fk_specialt_belong_to_specialt')->references('specialty_address_id')->on('specialty_address')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('specialty', function(Blueprint $table)
		{
			$table->dropForeign('fk_specialt_belong_to_specialt');
		});
	}

}
