<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    //Model pour la table : Rooms
    protected $primaryKey = null;
    protected $table = 'rooms';
    public $timestamps = false;
}
