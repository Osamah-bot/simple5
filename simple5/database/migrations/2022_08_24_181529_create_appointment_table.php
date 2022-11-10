<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointment', function(Blueprint $table)
		{
			$table->integer('appo_id', true);
			$table->integer('doctor_id')->nullable()->index('fk_appointm_relations_doctor');
			$table->integer('patient_id')->index('fk_appointm_relations_patient');
			$table->string('reason')->nullable();
			$table->timestamps(10);
			$table->string('status', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('appointment');
	}

}
