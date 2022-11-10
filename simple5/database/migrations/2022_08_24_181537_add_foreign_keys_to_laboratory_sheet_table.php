<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLaboratorySheetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('laboratory_sheet', function(Blueprint $table)
		{
			$table->foreign('treatmentid', 'fk_laborato_inheritan_treatmen')->references('treatmentid')->on('treatment')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('lab_technician_id', 'fk_laborato_relations_lab_tech')->references('lab_technician_id')->on('lab_technician')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('laboratory_sheet', function(Blueprint $table)
		{
			$table->dropForeign('fk_laborato_inheritan_treatmen');
			$table->dropForeign('fk_laborato_relations_lab_tech');
		});
	}

}
