<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestModelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('test_models', function(Blueprint $table)
		{
			$table->integer('id');
			$table->integer('test_id');
			$table->string('test_cat');
			$table->longtext('description');
			$table->string('test_code');
			$table->float('test_rate');
			$table->primary('test_id');
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
		Schema::drop('test_models');
	}

}
