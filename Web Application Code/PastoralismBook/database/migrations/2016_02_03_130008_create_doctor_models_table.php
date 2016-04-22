<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorModelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doctor_models', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('doc_id');
			$table->string('name_of_doctor');
			$table->string('designation_of_doctor');
			$table->longtext('specialist');
			$table->string('contact_no');
			$table->string('photo');
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
		Schema::drop('doctor_models');
	}

}
