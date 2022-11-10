<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('review', function(Blueprint $table)
		{
			$table->integer('review_id', true);
			$table->integer('room_id')->nullable()->index('room_id');
			$table->integer('appo_id')->nullable()->index('fk_review_relations_appointm');
			$table->string('review_reason')->nullable();
			$table->string('review_state', 20)->nullable();
			$table->dateTime('review_date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('review');
	}

}
