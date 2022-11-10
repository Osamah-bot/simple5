<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionMedcineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prescription_medcine', function(Blueprint $table)
		{
			$table->integer('prescription_medcine_id', true);
			$table->integer('medicineid')->index('fk_prescrip_relations_medicine');
			$table->integer('treatmentid')->index('fk_prescrip_relations_prescrip');
			$table->string('notes')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prescription_medcine');
	}

}
