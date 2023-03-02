<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //book
    public function book(Request $request, $user_id){
        $this->checkBookingValidation($request);
        $book = [
            'user_id' => $user_id,
            'room_type_id' => $request->room_type_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'adult' => $request->adult,
            'child' => $request->child,
            'wifi' => $request->wifi,
            'ext_services' => json_encode($request->ext_services),
        ];
        Booking::create($book);
        return redirect()->route('room.types')->with(['success' => 'Booking Success']);
    }

    private function checkBookingValidation($request){
        $request->validate([
            'check_in' => 'required',
            'check_out' => 'required',
            'adult' => 'required',
            'child' => 'required'
        ]);
    }
}
