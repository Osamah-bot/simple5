<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDoctorScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('doctor_schedule', function(Blueprint $table)
		{
			$table->foreign('review_id', 'fk_doctor_s_done_at_review')->references('review_id')->on('review')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('doctor_id', 'fk_doctor_s_relations_doctor')->references('doctor_id')->on('doctor')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('chedule_id', 'fk_doctor_s_relations_schedule')->references('chedule_id')->on('schedule')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('doctor_schedule', function(Blueprint $table)
		{
			$table->dropForeign('fk_doctor_s_done_at_review');
			$table->dropForeign('fk_doctor_s_relations_doctor');
			$table->dropForeign('fk_doctor_s_relations_schedule');
		});
	}

}
