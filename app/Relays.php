<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relays extends Model
{
    //Model pour la table : Relays
    protected $primaryKey = "name";
    public $timestamps = false;
    protected $table = 'relays';
    protected $keyType = 'string';
	public $incrementing = false;
    protected $fillable = [
        'name', 'status', 'gpio'
    ];
}
