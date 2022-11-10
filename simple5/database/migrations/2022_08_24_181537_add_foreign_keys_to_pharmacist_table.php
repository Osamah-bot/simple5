<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPharmacistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pharmacist', function(Blueprint $table)
		{
			$table->foreign('account_id', 'fk_pharmaci_must_has_account')->references('account_id')->on('account')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pharmacist', function(Blueprint $table)
		{
			$table->dropForeign('fk_pharmaci_must_has_account');
		});
	}

}
