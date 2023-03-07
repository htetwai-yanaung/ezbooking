<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    // room type index
    public function index(){
        $roomTypes = RoomType::get();
        return view('admin.roomTypes.index')->with(['roomTypes' => $roomTypes]);
    }

    // store room type
    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
        RoomType::create([
            'name' => $request->name
        ]);
        return back()->with(['success' => 'Room type create success']);
    }

    //eidt
    public function edit($id){
        $roomType = RoomType::find($id);
        return view('admin.roomTypes.edit')->with(['roomType' => $roomType]);
    }

    //update
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required'
        ]);
        RoomType::where('id', $id)->update([
            'name' => $request->name
        ]);
        return redirect()->route('dashboard.roomTypeIndex')->with(['success' => 'Room type update success']);
    }

    //delete
    public function delete($id){
        RoomType::where('id', $id)->delete();
        return back()->with(['success' => 'Room type delete success']);
    }
}
