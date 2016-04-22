<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMachinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('machines', function(Blueprint $table)
		{
			$table->increments('id');
            $table->date('date');
            $table->string('time');
            $table->integer('temperature');
            $table->integer('humidity');
            $table->integer('rain');
            $table->integer('wind_speed');
            $table->integer('barometric_presser');
            $table->string('wind_direction');
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
		Schema::drop('machines');
	}

}
