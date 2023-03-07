<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //admin login
    public function login(){
        return view('login');
    }

    //admin register
    public function register(){
        return view('register');
    }

    //admin or user
    public function role(){
        if(Auth::user()->role === "admin"){
            return redirect('/dashboard');
        }
        return redirect('/');
    }

    //dashboard
    public function dashboard(){
        $bookings = Booking::all();
        $checkInes = Booking::select('check_in as checkIn')->get()->toArray();
        $checkIn_array = [];
        $checkIn_user_name_array = [];
        foreach($checkInes as $checkIn){
            array_push($checkIn_array, $checkIn['checkIn']);
        }
        $checkIn_array = json_encode($checkIn_array);
        foreach($bookings as $booking){
            $user_id = $booking->user_id;
            $user = User::find($user_id);

            array_push($checkIn_user_name_array, $user->name);
        }
        // return $checkIn_user_name_array;
        return view('admin.booking.index')->with(['checkInes' => $checkIn_array, 'checkInUserNames' => $checkIn_user_name_array]);
    }

    //room index
    public function roomIndex(){
        $rooms = Room::with('roomType')->get();
        return view('admin.rooms.index')->with(['rooms' => $rooms]);
    }

    //room create
    public function roomCreate(){
        $roomTypes = RoomType::get();
        return view('admin.rooms.create')->with([
            'roomTypes' => $roomTypes
        ]);
    }

    //room store
    public function roomStore(Request $request){
        $this->checkRoomValidation($request);

        $coverPhoto = "cv".uniqid()."_".$request->file('cover_photo')->getClientOriginalName();
        $request->file('cover_photo')->move(public_path('asset/images'),$coverPhoto);

        $imageNames = [];
        foreach($request->file('images') as $image){
            $imageName = uniqid()."_".$image->getClientOriginalName();
            array_push($imageNames, $imageName);
            $image->move(public_path('asset/images'), $imageName);
        }

        $room = [
            'name' => $request->name,
            'room_type_id' => $request->room_type,
            'price' => $request->price,
            'beds' => $request->beds,
            'bed_count' => $request->bed_count,
            'description' => $request->description,
            'cover_photo' => $coverPhoto,
            'images' => json_encode($imageNames),
            'status' => $request->status ? $request->status : 'Maintenance',
        ];

        Room::create($room);
        return redirect()->route('dashboard.roomIndex')->with(['success' => 'Room successfully created.']);

    }







    //room type create
    public function roomTypeIndex(){
        return view('admin.roomTypes.index');
    }

    private function checkRoomValidation($request){
        $request->validate([
            'name' => 'required',
            'room_type' => 'required',
            'price' => 'required',
            'beds' => 'required',
            'bed_count' => 'required',
            'cover_photo' => 'required|mimes:jpg,png,jpeg,webp',
            'description' => 'required',
            'images' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg,webp',
        ]);
    }
}
