<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDueModelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('due_models', function(Blueprint $table)
		{
			$table->bigInteger('patient_id');
			$table->date('date_');
			$table->string('patient_name');
			$table->string('patient_phone');
			$table->float('total_amount');
			$table->float('discount_amount');
			$table->float('total_balance_amount');
			$table->float('paid');
			$table->float('due');
			$table->primary('patient_id');
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
		Schema::drop('due_models');
	}

}
