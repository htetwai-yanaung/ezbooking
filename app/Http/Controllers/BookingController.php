<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Guest;
use App\Models\Booking;
use App\Models\RoomType;
use App\Models\ExtService;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    //guest account-create
    public function guestAccountPage(){
        return view('user.guest.create-account');
    }

    //user or guest
    public function userOrGuest(){
        $roomTypes = RoomType::get();
        return view('user.home.user-or-guest')->with([
            'roomTypes' => $roomTypes
        ]);
    }

    //book
    public function booking(Request $request){

        dd($request->all());
        $this->checkBookingValidation($request);

        $screenshort = uniqid().'_'.$request->file('payment_ss')->getClientOriginalName();
        $request->file('payment_ss')->move(public_path('asset/images/'),$screenshort);

        $guestData = [
            'first_name' => $request->guestFirstName,
            'last_name' => $request->guestLastName,
            'email' => $request->guestEmail,
            'phone' => $request->guestPhone,
            'nationality' => $request->guestNationality,
            'address' => $request->guestAddress,
            'NRC' => $request->nrc,
            'passport' => $request->passport,
            'payment_method' => $request->payment_method,
            'payment_ss' => $screenshort,
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

    //booking data
    public function bookingData(Request $request, $id){

        // dd($request->all());
        $request->validate([
            'check_in' => 'required',
            'check_out' => 'required',
            'adult' => 'required',
            'child' => 'required',
        ]);
        $room = Room::find($id);
        $roomTypes = RoomType::get();
        $ext_service_id_arr = [];
        if($request->ext_services){
            foreach($request->ext_services as $ext_service){
                $ext_service_id = explode(',', $ext_service);
                array_push($ext_service_id_arr, $ext_service_id[0]);
            }
        }
        $extServices = ExtService::wherein('id', $ext_service_id_arr)->get();
        $booking_data = [
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'adult' => $request->adult,
            'child' => $request->child,
            'room_id' => $request->room_id,
            'price' => $request->price,
            'total_day' => $request->total_day,
            // 'ext_services' => json_encode($ext_service_id_arr),
        ];
        return view('user.home.booking-form')->with([
            'booking_data' => $booking_data,
            'roomTypes' => $roomTypes,
            'extServices' => $extServices,
            'room' => $room
        ]);
    }

    public function confirmBooking(Request $request){
        $request->validate([
            'payment_type' => 'required',
            'first_charge' => 'required',
            'payment_ss' => 'required|mimes:png,jpg',
        ]);
        $photo = uniqid().'_'.$request->file('payment_ss')->getClientOriginalName();
        $request->file('payment_ss')->move(public_path('asset/images'),$photo);

        $ext_services = json_decode($request->ext_services);
        Booking::create([
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'adult' => $request->adult,
            'child' => $request->child,
            'price' => $request->price,
            'first_charge' => $request->first_charge,
            'ext_services' => $request->ext_services,
            'payment_type' => $request->payment_type,
            'payment_ss' => $photo,
        ]);
        return redirect()->route('room.index')->with(['success' => 'Booking success']);
    }

    //list view
    public function listView(){
        $booking = Booking::with('user', 'room')->get();
        return view('admin.booking.listView')->with([
            'booking_list' => $booking
        ]);
    }

    //booking details
    public function details($id){
        $booking = Booking::with('user', 'room')->find($id);
        $ext_services = json_decode($booking->ext_services);
        // return $ext_services;
        return view('admin.booking.details')->with([
            'booking' => $booking,
            'ext_services' => $ext_services
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
            'payment_method' => 'required',
            'payment_ss' => 'required|mimes:jpg,png,jpeg',
        ]);
    }
}
