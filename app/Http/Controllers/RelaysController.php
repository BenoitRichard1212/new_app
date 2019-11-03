<?php

namespace App\Http\Controllers;

use App\Relays;
use Illuminate\Http\Request;

class RelaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relays = relays::orderBy('name')->first()->paginate(5);
        $relays->timestamps = false;
  
        return view('relays.index',compact('relays'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('relays.create');
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
            'status' => 'required',
            'gpio' => 'required',
        ]);
  
        relays::create($request->all());
   
        return redirect()->route('relays.index')
                        ->with('success','Relays created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\relays  $relays
     * @return \Illuminate\Http\Response
     */
    public function show(relays $relays)
    {
        return view('relays.show',compact('relays'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\relays  $relays
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $relays = Relays::where('name', $name)
                        ->where('name', $name)
                        ->first();

        return view('relays.edit', compact('relays', 'name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\relays  $relays
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name)
    {
        $relays = new Relays();
        $data = $this->validate($request, [
            'status'=>'required',
            'gpio'=>'required'
        ]);
        $data['name'] = $name;
        $relays->updateRelays($data);

        return redirect('/')->with('success', 'New Relays has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\relays  $relays
     * @return \Illuminate\Http\Response
     */
    public function destroy($name, relays $relays)
    {
       $relays::findOrFail($name)->delete();
  
        return redirect()->route('relays.index')
                        ->with('success','Relays deleted successfully');
    }
}
