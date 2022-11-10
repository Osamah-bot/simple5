<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDoctorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('doctor', function(Blueprint $table)
		{
			$table->foreign('account_id', 'fk_doctor_must_has_account')->references('account_id')->on('account')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('specialty_id', 'fk_doctor_works_at_specialt')->references('specialty_id')->on('specialty')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('doctor', function(Blueprint $table)
		{
			$table->dropForeign('fk_doctor_must_has_account');
			$table->dropForeign('fk_doctor_works_at_specialt');
		});
	}

}
