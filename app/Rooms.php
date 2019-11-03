<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    //Model pour la table : Rooms
    protected $primaryKey = 'name';
    protected $table = 'rooms';
    public $timestamps = false;
    protected $fillable = [
        'temp_min', 'sensor_floor', 'sensor_wall', 'relay'
    ];
}
