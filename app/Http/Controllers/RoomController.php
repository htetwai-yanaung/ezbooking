<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //room page
    public function index(){
        $rooms = Room::orderBy('created_at', 'desc')->get();
        return view('user.home.booking')->with(['rooms' => $rooms]);
    }

    //room details page
    public function details($id){
        $room = Room::find($id);
        $images = json_decode($room->images);
        $services = json_decode($room->services);
        return view('user.home.details')->with(['room' => $room, 'images' => $images, 'services' => $services]);
    }
}
