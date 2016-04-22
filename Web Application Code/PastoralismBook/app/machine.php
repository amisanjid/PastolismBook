<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class machine extends Model {

	protected $fillable=[
        'id',
        'date',
        'time',
        'temperature',
        'humidity',
        'rain',
        'wind_speed',
        'barometric_presser',
        'wind_direction'
    ];

}
