<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAppointmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('appointment', function(Blueprint $table)
		{
			$table->foreign('doctor_id', 'fk_appointm_relations_doctor')->references('doctor_id')->on('doctor')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('patient_id', 'fk_appointm_relations_patient')->references('patient_id')->on('patient')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('appointment', function(Blueprint $table)
		{
			$table->dropForeign('fk_appointm_relations_doctor');
			$table->dropForeign('fk_appointm_relations_patient');
		});
	}

}
