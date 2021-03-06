<?php

namespace App\Http\Controllers;

use App\Sensors;
use Illuminate\Http\Request;

class SensorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sensors = sensors::orderBy('sensor')->first()->paginate(5);
        $sensors->timestamps = false;
  
        return view('sensors.index',compact('sensors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sensors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sensor' => 'required',
            'temperature' => 'required',
            'humidity' => 'required',
            'device' => 'required',
        ]);
  
        sensors::create($request->all());
   
        return redirect()->route('sensors.index')
                        ->with('success','Sensors created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sensors  $sensors
     * @return \Illuminate\Http\Response
     */
    public function show(sensors $sensors)
    {
        return view('sensors.show',compact('sensors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sensors  $sensors
     * @return \Illuminate\Http\Response
     */
    public function edit($sensor)
    {
        $sensors = Sensors::where('sensor', $sensor)
                        ->where('sensor', $sensor)
                        ->first();

        return view('sensors.edit', compact('sensors', 'sensor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sensors  $sensors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sensor)
    {
        $sensors = new Sensors();
        $data = $this->validate($request, [
            'temperature'=>'max:255',
            'humidity'=>'max:255',
            'device'=>'max:255'
        ]);
        $data['sensor'] = $sensor;
        $sensors->updateSensors($data);

        return redirect('/')->with('success', 'New Sensors has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sensors  $sensors
     * @return \Illuminate\Http\Response
     */
    public function destroy($sensor, sensors $sensors)
    {
        $sensors::findOrFail($sensor)->delete();
  
        return redirect()->route('sensors.index')
                        ->with('success','Sensors deleted successfully');
    }
}
