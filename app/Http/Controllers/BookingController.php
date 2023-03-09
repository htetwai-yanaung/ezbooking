<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //book
    public function booking(Request $request){
        $this->checkBookingValidation($request);

        $guestData = [
            'name' => $request->guestName,
            'email' => $request->guestEmail,
            'phone' => $request->guestPhone,
            'nationality' => $request->guestNationality,
        ];
        $guest = Guest::create($guestData);

        $book = [
            'guest_id' => $guest->id,
            'room_id' => $request->room_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'adult' => $request->adult,
            'child' => $request->child,
            'wifi' => $request->wifi,
            'ext_services' => json_encode($request->ext_services),
        ];
        Booking::create($book);
        return redirect()->route('room.index')->with(['success' => 'Booking Success']);
    }

    private function checkBookingValidation($request){
        $request->validate([
            'check_in' => 'required',
            'check_out' => 'required',
            'adult' => 'required',
            'child' => 'required',
            'guestName' => 'required',
            'guestPhone' => 'required',
            'guestEmail' => 'required',
            'guestNationality' => 'required',
        ]);
    }
}
