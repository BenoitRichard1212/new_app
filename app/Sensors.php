<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensors extends Model
{
    //Model pour la table : temperaturedata;
    protected $primaryKey = null;
    protected $table = 'temperaturedata';
    public $timestamps = false;
}
