<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPrescriptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('prescription', function(Blueprint $table)
		{
			$table->foreign('treatmentid', 'fk_prescrip_inheritan_treatmen')->references('treatmentid')->on('treatment')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('pharmacist_id', 'fk_prescrip_relations_pharmaci')->references('pharmacist_id')->on('pharmacist')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('prescription', function(Blueprint $table)
		{
			$table->dropForeign('fk_prescrip_inheritan_treatmen');
			$table->dropForeign('fk_prescrip_relations_pharmaci');
		});
	}

}
