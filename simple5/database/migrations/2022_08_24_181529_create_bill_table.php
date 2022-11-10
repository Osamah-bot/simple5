<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bill', function(Blueprint $table)
		{
			$table->integer('billingid', true);
			$table->integer('accountant_id')->index('fk_bill_relations_accounta');
			$table->integer('review_id')->index('fk_bill_relations_review');
			$table->date('billing_date');
			$table->time('billing_time');
			$table->float('discount', 10, 0);
			$table->float('tax_amount', 10, 0);
			$table->text('discount_reason');
			$table->time('discharge_time');
			$table->date('discharge_date');
			$table->string('billing_state', 10)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bill');
	}

}
