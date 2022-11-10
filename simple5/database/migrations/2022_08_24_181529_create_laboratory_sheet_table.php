<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratorySheetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laboratory_sheet', function(Blueprint $table)
		{
			$table->integer('treatmentid', true);
			$table->integer('lab_technician_id')->nullable()->index('fk_laborato_relations_lab_tech');
			$table->timestamp('laboratory_date')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('laboratory_sheet');
	}

}
