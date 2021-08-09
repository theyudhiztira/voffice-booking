<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('admin.pages.login');
    }

    public function authenticate(Request $req)
    {
        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials, $req->exists('remember'))) {
            $req->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('admin.login'));
    }

    public function clientRegister(Request $req)
    {
        $validator = \Validator::make($req->all(), [
            'first_name' => 'required',
            'last_name' => 'nullable',
            'email' => 'required|email|unique:client,email',
            'phone' => 'required|unique:client,phone',
            'password' =>'required|confirmed|min:8'
        ]);

        if($validator->fails()){
            return redirect(route('web.register'))
            ->withErrors($validator)
            ->withInput();
        }

        $user = \App\Models\Client::create([
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'email' => $req->email,
            'phone' => $req->phone,
            'password' => \Hash::make($req->password)
        ]);

        if (\Auth::guard('client')->attempt($req->only('email', 'password'))) {
            $req->session()->regenerate();

            return redirect()->intended(route('web.home'))->with('new_user', true);
        }
    }

    public function clientLogin(Request $req)
    {
        $validator = \Validator::make($req->all(), [
            'email' => 'required|email|exists:client,email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return redirect(route('web.login'))
            ->withErrors($validator)
            ->withInput();
        }

        if(\Auth::guard('client')->attempt($req->only('email', 'password'))){
            $req->session()->regenerate();

            return redirect()->intended(route('web.home'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function clientLogout()
    {
        Auth::guard('client')->logout();

        return redirect(url('/'));
    }
}
