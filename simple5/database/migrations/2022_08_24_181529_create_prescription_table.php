<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prescription', function(Blueprint $table)
		{
			$table->integer('treatmentid', true);
			$table->integer('pharmacist_id')->index('fk_prescrip_relations_pharmaci');
			$table->date('prescription_date');
			$table->string('status', 10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prescription');
	}

}
