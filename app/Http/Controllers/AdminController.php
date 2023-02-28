<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
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
}
