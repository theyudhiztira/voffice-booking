<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function index(){
        $userData = User::all();

        return view('admin.pages.user.index', [
            'userData' => $userData
        ]);
    }

    public function create()
    {
        return view('admin.pages.user.create');
    }

    public function edit($id)
    {
        $user = User::find($id);

        if(empty($user)){
            return abort(404);
        }

        return view('admin.pages.user.edit', [
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name
        ]);
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email'
        ]);

        if($validator->fails()){
            return redirect(route('admin.user.create'))
            ->withErrors($validator)
            ->withInput();
        }

        $password = Str::random(8);

        Mail::send('admin.emails.user_registered', [
            'name' => $req->name,
            'password' => $password
        ], function ($message) use ($req) {
            $message->from('noreply@voffice.co.id', 'vOffice');
            $message->sender('noreply@voffice.co.id', 'vOffice');
            $message->to($req->email, $req->name);
            $message->subject('Your Access to vOffice Booking Manager');
        });


        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($password),
            'created_by' => \Auth::user()->id
        ]);

        return redirect(route('admin.user.index'));
    }

    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($req->id)
            ]
        ]);

        if($validator->fails()){
            return redirect(route('admin.user.edit'))
            ->withErrors($validator)
            ->withInput();
        }

        $user = User::find($req->id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->save();

        return redirect(route('admin.user.index'));
    }

    public function delete($id)
    {
        $user = User::find($id);

        if(empty($user)){
            return abort(404);
        }

        $user->delete();

        return redirect(route('admin.user.index'));
    }
}
