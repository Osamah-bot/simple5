<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAccountantTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('accountant', function(Blueprint $table)
		{
			$table->foreign('account_id', 'fk_accounta_must_has_account')->references('account_id')->on('account')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('accountant', function(Blueprint $table)
		{
			$table->dropForeign('fk_accounta_must_has_account');
		});
	}

}
