<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class global_settings extends Model
{
    //Model pour la table : global_settings;
    protected $primaryKey = 'name';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'global_settings';
    public $timestamps = false;
    protected $fillable = [
        'name', 'value'
    ];

    public function updateGS($data)
	{
	        $gs = $this->find($data['name']);
	        $gs->name = $data['name'];
	        $gs->value = $data['value'];
	        $gs->save();
	        return 1;
	}
}
