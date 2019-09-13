<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rooms;

class RoomsController extends Controller
{
    //Controller pour la table Rooms.
    public function index()
    {
        $rooms = Rooms::all();
        return view('rooms', ['rooms' => $rooms]);
    }

    public function getRoom($p_room)
    {
        $room = Room::where('room', $p_room->name)->first();
        return $room;
    }
}
