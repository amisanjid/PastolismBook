<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientModelsTable extends Migration {

	/**
	 * Run the migrations.
	 * 
	 * @return void
	 */
	public function up()
	{
		Schema::create('patient_models', function(Blueprint $table)
		{
			$table->bigInteger('patient_id');
			$table->string('patient_name');
			$table->string('patient_contact');
			$table->integer('age');
			$table->date('date');
			$table->time('time');
			$table->string('gender');
			$table->longtext('address');
			$table->integer('tid'); //Receipt No
			$table->string('disease');
			$table->string('reference_doctor');
			$table->string('test1');
			$table->integer('discount1');
			$table->float('discount1_amont');
			$table->float('bal_amount_1');
			$table->float('test1_prince');
			$table->string('test2');
			$table->integer('discount2');
			$table->float('discount2_amont');
			$table->float('bal_amount_2');
			$table->float('test2_prince');
			$table->string('test3');
			$table->integer('discount3');
			$table->float('discount3_amont');
			$table->float('bal_amount_3');
			$table->float('test3_prince');
			$table->string('test4');
			$table->integer('discount4');
			$table->float('discount4_amont');
			$table->float('bal_amount_4');
			$table->float('test4_prince');
			$table->string('test5');
			$table->integer('discount5');
			$table->float('discount5_amont');
			$table->float('bal_amount_5');
			$table->float('test5_prince');
			$table->string('test6');
			$table->integer('discount6');
			$table->float('discount6_amont');
			$table->float('bal_amount_6');
			$table->float('test6_prince');
			$table->string('test7');
			$table->integer('discount7');
			$table->float('discount7_amont');
			$table->float('bal_amount_7');
			$table->float('test7_prince');
			$table->string('test8');
			$table->integer('discount8');
			$table->float('discount8_amont');
			$table->float('bal_amount_8');
			$table->float('test8_prince');
			$table->string('test9');
			$table->integer('discount9');
			$table->float('discount9_amont');
			$table->float('bal_amount_9');
			$table->float('test9_prince');
			$table->string('test10');
			$table->integer('discount10');
			$table->float('discount10_amont');
			$table->float('bal_amount_10');
			$table->float('test10_prince');
			$table->string('test11');
			$table->integer('discount11');
			$table->float('discount11_amont');
			$table->float('bal_amount_11');
			$table->float('test11_prince');
			$table->string('test12');
			$table->integer('discount12');
			$table->float('discount12_amont');
			$table->float('bal_amount_12');
			$table->float('test12_prince');
			$table->string('test13');
			$table->integer('discount13');
			$table->float('discount13_amont');
			$table->float('bal_amount_13');
			$table->float('test13_prince');
			$table->string('test14');
			$table->integer('discount14');
			$table->float('discount14_amont');
			$table->float('bal_amount_14');
			$table->float('test14_prince');
			$table->string('test15');
			$table->integer('discount15');
			$table->float('discount15_amont');
			$table->float('bal_amount_15');
			$table->float('test15_prince');
			$table->string('test16');
			$table->integer('discount16');
			$table->float('discount16_amont');
			$table->float('bal_amount_16');
			$table->float('test16_prince');
			$table->string('test17');
			$table->integer('discount17');
			$table->float('discount17_amont');
			$table->float('bal_amount_17');
			$table->float('test17_prince');
			$table->string('test18');
			$table->integer('discount18');
			$table->float('discount18_amont');
			$table->float('bal_amount_18');
			$table->float('test18_prince');
			$table->string('test19');
			$table->integer('discount19');
			$table->float('discount19_amont');
			$table->float('bal_amount_19');
			$table->float('test19_prince');
			$table->string('test20');
			$table->integer('discount20');
			$table->float('discount20_amont');
			$table->float('bal_amount_20');
			$table->float('test20_prince');
			$table->float('total_balance_amount');
			$table->float('total_price');
			$table->float('total_discount_money');
			$table->float('paid');
			$table->float('due_collection');
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
		Schema::drop('patient_models');
	}

}
