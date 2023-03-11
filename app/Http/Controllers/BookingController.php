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
            'first_name' => $request->guestFirstName,
            'last_name' => $request->guestLastName,
            'email' => $request->guestEmail,
            'phone' => $request->guestPhone,
            'nationality' => $request->guestNationality,
            'address' => $request->guestAddress,
            'NRC' => $request->nrc,
            'passport' => $request->passport,
        ];
        $guest = Guest::create($guestData);

        $book = [
            'guest_id' => $guest->id,
            'room_id' => $request->room_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'adult' => $request->adult,
            'child' => $request->child,
            'ext_services' => json_encode($request->ext_services),
            'price' => $request->price,
        ];
        Booking::create($book);
        return redirect()->route('room.index')->with(['success' => 'Booking Success']);
    }

    //list view
    public function listView(){
        $booking_list = Booking::with('guest', 'room', 'room.roomType')->get();
        // return $booking_list;
        return view('admin.booking.listView')->with([
            'booking_list' => $booking_list
        ]);
    }

    private function checkBookingValidation($request){
        $request->validate([
            'check_in' => 'required',
            'check_out' => 'required',
            'adult' => 'required',
            'child' => 'required',
            'guestFirstName' => 'required',
            'guestLastName' => 'required',
            'guestPhone' => 'required',
            'guestEmail' => 'required',
            'guestNationality' => 'required',
            'guestAddress' => $request->guestNationality == 'myanmar' ? 'required' : '',
            'passport' => $request->guestNationality == 'myanmar' ? '' : 'required',
            'nrc' =>  $request->guestNationality == 'myanmar' ?'required' : '',
        ]);
    }
}
