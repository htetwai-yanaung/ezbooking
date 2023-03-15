<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use App\Models\ExtService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //room page
    public function index(){
        $rooms = Room::orderBy('created_at', 'desc')->get();
        $roomTypes = RoomType::get();
        return view('user.home.booking')->with(['rooms' => $rooms, 'roomTypes' => $roomTypes]);
    }

    //room details page
    public function details($id){
        $room = Room::find($id);
        $roomTypes = RoomType::get();
        $ext_services = ExtService::get();
        $images = json_decode($room->images);
        $services = json_decode($room->services);
        return view('user.home.details')->with([
            'room' => $room,
            'images' => $images,
            'services' => $services,
            'roomTypes' => $roomTypes,
            'ext_services' => $ext_services
        ]);
    }
}
