<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTreatmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('treatment', function(Blueprint $table)
		{
			$table->foreign('review_id', 'fk_treatmen_contain_review')->references('review_id')->on('review')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('treatment', function(Blueprint $table)
		{
			$table->dropForeign('fk_treatmen_contain_review');
		});
	}

}
