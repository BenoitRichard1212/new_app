<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensors;

class SensorsController extends Controller
{
    //Controller pour le model : Sensors.
    public function index()
    {
        $sensors = Sensors::all();
        return view('sensors', ['sensors' => $sensors]);
    }

    public function getSensor($p_sensor)
    {
        $sensor = Sensor::where('sensor', $p_sensor->sensor)->first();
        return $sensor;
    }
}
