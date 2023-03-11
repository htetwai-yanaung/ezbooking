<?php

namespace App\Http\Controllers;

use App\Models\FreeService;
use Illuminate\Http\Request;

class FreeServiceController extends Controller
{
    //index
    public function index(){
        $freeServices = FreeService::get();
        return view('admin.roomServices.index')->with(['freeServices' => $freeServices]);
    }

    //store service
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        FreeService::create([
            'name' => $request->name,
            'icon' => $request->icon,
        ]);
        return back()->with(['success' => 'Survice create success!']);
    }

    //edit page
    public function edit($id){
        $service = FreeService::find($id);
        return view('admin.roomServices.edit')->with(['service' => $service]);
    }

    //update service
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);
        FreeService::where('id', $id)->update([
            'name'=> $request->name
        ]);
        return redirect()->route('services.index')->with(['success' => 'Service update success!']);
    }

    //delete service
    public function delete($id){
        FreeService::where('id', $id)->delete();
        return back()->with(['success' => 'Service delete success!']);
    }
}
