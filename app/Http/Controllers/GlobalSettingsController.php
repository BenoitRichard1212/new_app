<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GlobalSettingsController extends Controller
{
    public function index()
    {
        $relays = Relays::all();
        return view('relays', ['relays' => $relays]);
    }

    public function getRelay($p_relay)
    {
        $relay = Relays::where('relays', $p_relay->name)->first();
        return $relay;
    }
}
