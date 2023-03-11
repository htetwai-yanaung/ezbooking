<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\RoomType;
use App\Models\FreeService;
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
        // $checkIn_array = [];
        // $checkIn_user_name_array = [];
        // foreach($checkInes as $checkIn){
        //     array_push($checkIn_array, $checkIn['checkIn']);
        // }
        // $checkIn_array = json_encode($checkIn_array);
        // foreach($bookings as $booking){
        //     $guest_id = $booking->guest_id;
        //     $user = User::find($guest_id);

        //     array_push($checkIn_user_name_array, $user->name);
        // }
        // return $checkIn_user_name_array;
        return view('admin.booking.index');
    }

    //room index
    public function roomIndex(){
        $rooms = Room::with('roomType')->get();
        return view('admin.rooms.index')->with(['rooms' => $rooms]);
    }

    //room create
    public function roomCreate(){
        $roomTypes = RoomType::get();
        $services = FreeService::get();
        return view('admin.rooms.create')->with([
            'roomTypes' => $roomTypes,
            'services' => $services,
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

        $services = [];
        foreach($request->services as $service){
            array_push($services, $service);
        }

        $room = [
            'title' => $request->title,
            'room_number' => $request->room_number,
            'room_type_id' => $request->room_type,
            'price' => $request->price,
            'beds' => $request->beds,
            'bed_count' => $request->bed_count,
            'description' => $request->description,
            'cover_photo' => $coverPhoto,
            'images' => json_encode($imageNames),
            'services' => json_encode($services),
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
            'title' => 'required',
            'room_number' => 'required',
            'room_type' => 'required',
            'price' => 'required',
            'beds' => 'required',
            'bed_count' => 'required',
            'cover_photo' => 'required|mimes:jpg,png,jpeg,webp',
            'description' => 'required',
            'images' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg,webp',
            'services' => 'required',
        ]);
    }
}
