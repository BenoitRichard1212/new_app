<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensors extends Model
{
    //Model pour la table : temperaturedata;
    protected $primaryKey = "sensor";
    protected $table = 'temperaturedata';
    protected $keyType = 'string';
	public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'sensor', 'temperature', 'humidity', 'device'
    ];
}
