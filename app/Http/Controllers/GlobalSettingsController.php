<?php

namespace App\Http\Controllers;

use App\global_settings;
use Illuminate\Http\Request;

class GlobalSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $global_settings = global_settings::orderBy('name')->first()->paginate(5);
        $global_settings->timestamps = false;
  
        return view('global_settings.index',compact('global_settings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('global_settings.create');
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
            'name' => 'required',
            'value' => 'required',
        ]);
  
        global_settings::create($request->all());
   
        return redirect()->route('global_settings.index')
                        ->with('success','Global Settings created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\global_settings  $global_settings
     * @return \Illuminate\Http\Response
     */
    public function show(global_settings $global_settings)
    {
        return view('global_settings.show',compact('global_settings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\global_settings  $global_settings
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $gs = global_settings::where('name', $name)
                        ->where('name', $name)
                        ->first();

        return view('global_settings.edit', compact('gs', 'name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\global_settings  $global_settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name)
    {
        $gs = new global_settings();
        $data = $this->validate($request, [
            'value'=>'required'
        ]);
        $data['name'] = $name;
        $gs->updateGS($data);

        return redirect('/')->with('success', 'New Global Settings has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\global_settings  $global_settings
     * @return \Illuminate\Http\Response
     */
    public function destroy($name, global_settings $global_settings)
    {
        $global_settings::findOrFail($name)->delete();

        return redirect()->route('global_settings.index')
                        ->with('success','Global Settings deleted successfully');
    }

    /**
     * Trigger the variable to initiate system shutdown.
     */
    public function systemShutdown()
    {
        $gs_power = global_settings::find('power');
        $gs_shutdown_init = global_settings::find('power_shutoff');

        if ($gs_power->value == 1) {
            global_settings::where('name', 'power_shutoff')->update(array('value' => 1));
        }
        
        if ($gs_shutdown_init->value == 0) {
            global_settings::where('name', 'power')->update(array('value' => 1));
            global_settings::where('name', 'power_shutof')->update(array('value' => 0));
        }
        
        return redirect()->back();
    }

    /**
     * Change the variable to switch the mode. Heat / cool.
     */
    public function modeClim()
    {
        $gs = global_settings::find('modeClim');

        if ($gs->value == 1) {
            global_settings::where('name', 'modeClim')->update(array('value' => 0));
        }
        
        if ($gs->value == 0) {
            global_settings::where('name', 'modeClim')->update(array('value' => 1));
        }

        return redirect()->back();
    }

    /**
     * Switch the pool heating on / off
     */
    public function modePiscine()
    {
        $gs = global_settings::find('modePiscine');

        if ($gs->value == 1) {
            global_settings::where('name', 'modePiscine')->update(array('value' => 0));
        }
        
        if ($gs->value == 0) {
            global_settings::where('name', 'modePiscine')->update(array('value' => 1));
        }
        
        return redirect()->back();
    }
}
