<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class global_settings extends Model
{
    //Model pour la table : global_settings;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'global_settings';
    public $timestamps = false;
    protected $fillable = [
        'name', 'value'
    ];
}
