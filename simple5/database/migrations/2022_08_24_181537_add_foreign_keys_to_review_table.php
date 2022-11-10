<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToReviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('review', function(Blueprint $table)
		{
			$table->foreign('appo_id', 'fk_review_relations_appointm')->references('appo_id')->on('appointment')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('room_id', 'review_ibfk_1')->references('room_id')->on('room')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('review', function(Blueprint $table)
		{
			$table->dropForeign('fk_review_relations_appointm');
			$table->dropForeign('review_ibfk_1');
		});
	}

}
