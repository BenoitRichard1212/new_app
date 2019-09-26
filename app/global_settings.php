<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class global_settings extends Model
{
    //Model pour la table : global_settings;
    protected $primaryKey = "name";
    public $incrementing = false;
    protected $table = 'global_settings';
    public $timestamps = false;
    protected $fillable = [
        'name', 'value'
    ];
}
