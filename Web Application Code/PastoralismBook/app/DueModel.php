<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DueModel extends Model {

	protected $fillable=[
		'patient_id',
		'date_',
		'patient_name',
		'patient_phone',
		'total_amount',
		'discount_amount',
		'paid',
		'due'
	];

}
