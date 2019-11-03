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

    public function updateRelays($data)
	{
	        $relays = $this->find($data['name']);
	        $relays->name = $data['name'];
	        $relays->value = $data['status'];
	        $relays->gpio = $data['gpio'];
	        $relays->save();
	        return 1;
	}
}
