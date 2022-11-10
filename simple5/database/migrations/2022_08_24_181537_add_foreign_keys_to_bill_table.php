<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bill', function(Blueprint $table)
		{
			$table->foreign('accountant_id', 'fk_bill_relations_accounta')->references('accountant_id')->on('accountant')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('review_id', 'fk_bill_relations_review')->references('review_id')->on('review')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bill', function(Blueprint $table)
		{
			$table->dropForeign('fk_bill_relations_accounta');
			$table->dropForeign('fk_bill_relations_review');
		});
	}

}
