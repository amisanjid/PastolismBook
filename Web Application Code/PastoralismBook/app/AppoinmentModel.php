<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AppoinmentModel extends Model {

	protected $table='appoinment_models';
	protected $fillable=[
		'id',
		'pat_code',
		'pat_name',
		'pat_contact',
		'date',
		'time'
	];

}
