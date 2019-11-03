<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    //Model pour la table : Rooms
    protected $primaryKey = 'name';
    protected $table = 'rooms';
    protected $keyType = 'string';
	public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'name', 'temp_min', 'mode'
    ];

    public function updateRooms($data)
	{
	        $rooms = $this->find($data['name']);
	        $rooms->name = $data['name'];
	        $rooms->temp_min = $data['temp_min'];
            $rooms->mode = $data['mode'];
	        $rooms->save();
	        return 1;
	}
}
