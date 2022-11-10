<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPrescriptionMedcineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('prescription_medcine', function(Blueprint $table)
		{
			$table->foreign('medicineid', 'fk_prescrip_relations_medicine')->references('medicineid')->on('medicine')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('treatmentid', 'fk_prescrip_relations_prescrip')->references('treatmentid')->on('prescription')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('prescription_medcine', function(Blueprint $table)
		{
			$table->dropForeign('fk_prescrip_relations_medicine');
			$table->dropForeign('fk_prescrip_relations_prescrip');
		});
	}

}
