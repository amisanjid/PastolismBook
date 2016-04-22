<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorModel extends Model {

	protected $table='doctor_models';
	protected $fillable=[
		'id',
		'doc_id',
		'name_of_doctor',
		'designation_of_doctor',
		'specialist',
		'contact_no',
		'photo'
	];

}
