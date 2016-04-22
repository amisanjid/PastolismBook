<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyIncomeStatementModel extends Model {

	protected $fillable=[
		'patient_id',
		'date',
		'total_amount',
		'discount_amount',
		'balance_amount',
		'advance_paid',
		'due',
		'due_collection',
		'total_paid'
	];

}
