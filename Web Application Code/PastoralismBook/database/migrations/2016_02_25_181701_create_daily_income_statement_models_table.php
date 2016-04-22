<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyIncomeStatementModelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('daily_income_statement_models', function(Blueprint $table)
		{
			$table->bigInteger('patient_id');
			$table->date('date');
			$table->float('total_amount');
			$table->float('discount_amount');
			$table->float('balance_amount');
			$table->float('advance_paid'); //Paid
			$table->float('due');
			$table->float('due_collection');
			$table->float('total_paid');
			//$table->primary('patient_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('daily_income_statement_models');
	}

}
