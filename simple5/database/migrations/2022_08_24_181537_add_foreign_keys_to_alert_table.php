<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAlertTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('alert', function(Blueprint $table)
		{
			$table->foreign('review_id', 'fk_alert_relations_review')->references('review_id')->on('review')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('alert', function(Blueprint $table)
		{
			$table->dropForeign('fk_alert_relations_review');
		});
	}

}
