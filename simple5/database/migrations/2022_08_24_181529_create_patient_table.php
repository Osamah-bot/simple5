<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patient', function(Blueprint $table)
		{
			$table->integer('patient_id', true);
			$table->integer('patient_wait_code')->nullable();
			$table->string('patient_bar_code', 100)->nullable();
			$table->integer('account_id')->nullable()->index('fk_patient_must_has_account');
			$table->string('fname', 50)->nullable();
			$table->string('lname', 50)->nullable();
			$table->decimal('mobile', 13, 0)->nullable();
			$table->string('email')->nullable()->unique('email');
			$table->date('birth')->nullable();
			$table->string('gender', 10)->nullable()->default('Male');
			$table->string('country', 30)->nullable();
			$table->string('city', 50)->nullable();
			$table->string('zone', 50)->nullable();
			$table->string('img_url', 100)->nullable();
			$table->string('boodGroup', 4)->default('none');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('patient');
	}

}
