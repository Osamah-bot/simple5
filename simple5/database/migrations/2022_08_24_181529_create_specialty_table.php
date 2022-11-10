<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialtyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('specialty', function(Blueprint $table)
		{
			$table->integer('specialty_id', true);
			$table->integer('specialty_address_id')->nullable()->index('fk_specialt_belong_to_specialt');
			$table->string('specialty_name', 50)->nullable();
			$table->date('specialty_create_date')->nullable();
			$table->string('specialty_img', 100)->nullable();
			$table->string('status', 10)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('specialty');
	}

}
