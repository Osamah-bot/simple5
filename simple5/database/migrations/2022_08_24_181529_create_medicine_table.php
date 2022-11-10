<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medicine', function(Blueprint $table)
		{
			$table->integer('medicineid', true);
			$table->string('medicinename', 25);
			$table->string('quantity', 50)->nullable();
			$table->float('medicinecost', 10, 0);
			$table->text('description');
			$table->string('status', 10);
			$table->string('medicine_img_url', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('medicine');
	}

}
