<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin', function(Blueprint $table)
		{
			$table->integer('admin_id', true);
			$table->integer('account_id')->nullable()->index('fk_admin_must_has_account');
			$table->string('fname', 50)->nullable();
			$table->string('lname', 50)->nullable();
			$table->decimal('mobile', 13, 0)->nullable();
			$table->string('email', 60)->nullable();
			$table->date('birth')->nullable();
			$table->string('country', 30)->nullable();
			$table->string('city', 50)->nullable();
			$table->string('zone', 50)->nullable();
			$table->string('img_url', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admin');
	}

}
