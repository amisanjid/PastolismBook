<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TestModel extends Model {

	protected $table='test_models';
	protected $fillable=[
							'id',
							'test_id',
							'test_cat',
							'description',
							'test_code',
							'test_rate'
						];

}
