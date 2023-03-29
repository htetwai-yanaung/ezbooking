<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    //index
    public function history($id){
        $roomTypes = RoomType::get();
        // $bookings = Booking::all()
        // ->where('email',Auth::user()->email)
        // ->select('rooms.price as price')
        // ->groupBy('booking_number')
        // ->join('rooms','bookings.room_id','rooms.id');
        $bookings = Booking::all()->where('email',Auth::user()->email)->groupBy('booking_number');
        $rooms = [];
        foreach($bookings as $booking){
            foreach($booking as $b){
                $rooms[] = Room::where('id',$b->room_id)->first();
            }
        }
        // return $rooms;
        return view('user.home.history')->with([
            'roomTypes' => $roomTypes,
            'bookings' => $bookings,
            'rooms' => $rooms,
        ]);
    }
}
