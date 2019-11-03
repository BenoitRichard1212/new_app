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

        return redirect('/welcome')->with('success', 'New Global Settings has been updated!!');
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
}
