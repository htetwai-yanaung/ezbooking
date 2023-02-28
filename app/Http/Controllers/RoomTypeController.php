<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    //room page
    public function types(){
        $roomTypes = RoomType::get();
        return view('user.home.booking')->with(['roomTypes' => $roomTypes]);
    }

    //room details page
    public function details($id){
        $roomType = RoomType::find($id);
        return view('user.home.details')->with(['roomType' => $roomType]);
    }
}
