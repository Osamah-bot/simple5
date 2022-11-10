<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doctor', function(Blueprint $table)
		{
			$table->integer('doctor_id', true);
			$table->integer('account_id')->nullable()->index('fk_doctor_must_has_account');
			$table->integer('specialty_id')->nullable()->index('fk_doctor_works_at_specialt');
			$table->string('fname', 50)->nullable();
			$table->string('lname', 50)->nullable();
			$table->decimal('mobile', 13, 0)->nullable();
			$table->string('email', 60)->nullable()->unique('email');
			$table->date('birth')->nullable();
			$table->string('gender', 4)->nullable()->default('none');
			$table->string('boodGroup', 4)->default('none');
			$table->string('country', 30)->nullable();
			$table->string('city', 50)->nullable();
			$table->string('zone', 50)->nullable();
			$table->string('img_url', 100)->nullable();
			$table->decimal('monthly_sal', 9, 0)->nullable();
			$table->decimal('doctor_rate_salary', 4)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('doctor');
	}

}
