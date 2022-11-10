<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doctor_schedule', function(Blueprint $table)
		{
			$table->integer('doctor_schedule_id', true);
			$table->integer('doctor_id')->index('fk_doctor_s_relations_doctor');
			$table->integer('chedule_id')->index('fk_doctor_s_relations_schedule');
			$table->integer('review_id')->nullable()->index('fk_doctor_s_done_at_review');
			$table->string('book_available', 10)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('doctor_schedule');
	}

}
