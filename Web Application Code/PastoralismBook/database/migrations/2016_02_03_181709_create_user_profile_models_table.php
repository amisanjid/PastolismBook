<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileModelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profile_models', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('personal_id');
			$table->string('name');
			$table->longtext('about');
			$table->string('picture');
			$table->string('job_company_name');
			$table->string('job_designation');
			$table->longtext('address');
			$table->string('education');
			$table->date('date_of_birth');
			$table->string('contact_no');
			$table->string('gender');
			$table->string('email');
			$table->integer('general_user');
			$table->integer('admin');
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
		Schema::drop('user_profile_models');
	}

}
