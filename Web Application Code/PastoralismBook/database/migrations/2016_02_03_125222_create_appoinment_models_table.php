<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppoinmentModelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appoinment_models', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('pat_code');
			$table->string('pat_name');
			$table->string('pat_contact');
			$table->date('date');
			$table->time('time');
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
		Schema::drop('appoinment_models');
	}

}
