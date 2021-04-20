<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = \App\Models\Location::all();

        return view('admin.pages.location.index', [
            'locations' => $locations
        ]);
    }

    public function create(Request $req)
    {
        return view('admin.pages.location.create');
    }

    public function edit($id)
    {
        $location = \App\Models\Location::find($id);

        if(empty($location)){
            return abort(404);
        }

        return view('admin.pages.location.edit', $location);
    }

    public function store(Request $req)
    {
        $validator = \Validator::make($req->all(), [
            'name' => 'required',
            'address' => 'required|min:15',
            'image' => 'required|image'
        ]);

        if($validator->fails()){
            return redirect(route('admin.location.create'))
            ->withErrors($validator)
            ->withInput();
        }

        $location = new \App\Models\Location;
        $location->name = $req->name;
        $location->address = $req->address;
        $location->image = "default.jpeg";
        $location->created_by = \Auth::user()->id;
        $location->save();

        $file = $req->file('image');
        $fileName = $location->id.".".$file->getClientOriginalExtension();
        $file->move('img/locations', $fileName);
        $location->image = $fileName;
        $location->save();

        return redirect(route('admin.location.index'));
    }

    public function update(Request $req)
    {
        $validator = \Validator::make($req->all(), [
            'id' => 'exists:location,id',
            'name' => 'required',
            'address' => 'required|min:15',
            'image' => 'required|image'
        ]);

        if($validator->fails()){
            return redirect(route('admin.location.edit'))
            ->withErrors($validator)
            ->withInput();
        }

        $location = \App\Models\Location::find($req->id);
        $location->name = $req->name;
        $location->address = $req->address;

        $file = $req->file('image');
        $fileName = $location->id.".".$file->getClientOriginalExtension();
        $file->move('img/locations', $fileName);

        $location->image = $fileName;
        $location->save();

        return redirect(route('admin.location.index'));
    }

    public function delete($id)
    {
        $location = \App\Models\Location::find($id);

        if(empty($location)){
            return abort(404);
        }

        if(\File::exists(public_path('img/locations/'.$location->image))){
            \File::delete(public_path('img/locations/'.$location->image));
        }

        $location->delete();

        return redirect(route('admin.location.index'));
    }
}
