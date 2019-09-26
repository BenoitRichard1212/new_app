<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GlobalSettingsController extends Controller
{
    public function create()
    {
        return view('global_settings.create');
    }
    
    public function index()
    {
        $gsettings = global_settings::all();
        return view('gsettings', ['gsettings' => $gsettings]);
    }

    public function getSetting($p_setting)
    {
        $setting = global_settings::where('gsettings', $p_gsetting->name)->first();
        return $gsetting;
    }
}
