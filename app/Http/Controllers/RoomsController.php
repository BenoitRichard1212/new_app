<?php

namespace App\Http\Controllers;

use App\Rooms;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = rooms::orderBy('name')->first()->paginate(5);
        $rooms->timestamps = false;
  
        return view('rooms.index',compact('rooms'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
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
            'temp_min' => 'required',
            'sensor_floor' => 'required',
            'sensor_wall' => 'required',
            'relay' => 'required',
            'mode' => 'required',
        ]);
  
        rooms::create($request->all());
   
        return redirect()->route('rooms.index')
                        ->with('success','Rooms created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function show(rooms $rooms)
    {
        return view('rooms.show',compact('rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $rooms = Rooms::where('name', $name)
                        ->where('name', $name)
                        ->first();

        return view('rooms.edit', compact('rooms', 'name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name)
    {
        $rooms = new Rooms();
        $data = $this->validate($request, [
            'temp_min'=>'max:255',
            'sensor_floor'=>'max:255',
            'sensor_wall'=>'max:255',
            'relay'=>'max:255',
            'mode' => 'max:255'
        ]);
        $data['name'] = $name;
        $rooms->updateRooms($data);

        return redirect('/')->with('success', 'New Rooms has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rooms  $rooms
     * @return \Illuminate\Http\Response
     */
    public function destroy($name, rooms $rooms)
    {
        $rooms::findOrFail($name)->delete();
  
        return redirect()->route('rooms.index')
                        ->with('success','Rooms deleted successfully');
    }
}
