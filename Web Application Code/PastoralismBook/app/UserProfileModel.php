<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfileModel extends Model {

	protected $table='user_profile_models';
	protected $fillable=[
		'id',
		'personal_id',
		'name',
		'about',
		'picture',
		'job_company_name',
		'job_designation',
		'address',
		'education',
		'date_of_birth',
		'contact_no',
		'gender',
		'email',
		'general_user',
		'admin'
	];

}
