<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('account', function(Blueprint $table)
		{
			$table->integer('account_id', true);
			$table->string('account_type', 20)->nullable();
			$table->string('email')->nullable()->unique('email');
			$table->string('password')->nullable();
			$table->dateTime('last_signed_on')->nullable();
			$table->dateTime('last_signed_out')->nullable();
			$table->string('remember_token')->nullable();
			$table->timestamps(10);
			$table->string('account_state', 10)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('account');
	}

}
