<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = \App\Models\Client::all();

        return view('admin.pages.client.index', [
            'clients' =>  $clients
        ]);
    }

    public function publicIndex()
    {
      $client = \App\Models\Client::find(\Auth::guard('client')->user()->id);
      
      return view('web.pages.settings', $client);
    }

    public function changePersonalInfo(Request $req)
    {
      $client = \App\Models\Client::find(\Auth::guard('client')->user()->id);
      
      $request = $req->except('_token');
      
      foreach ($request as $key => $value) {
        $client->$key = $value;
      }

      $client->save();

      return redirect(route('web.settings.index'))->with('personal_success', 'Data has been saved');
    }

    public function changePassword(Request $req)
    {
      $validator = \Validator::make($req->all(), [
          'current_password' => 'required|min:5',
          'new_password' => 'required|min:8|confirmed'
      ]);

      if($validator->fails()){
          return back()->withErrors($validator)
          ->withInput();
      }

      $client = \App\Models\Client::find(\Auth::guard('client')->user()->id);
      
      if(!\Hash::check($req->current_password, $client->password)){
        return back()->withErrors([
          'current_password' => 'Current password is wrong, please enter your correct password!'
        ]);
      }

      $client->password = \Hash::make($req->new_password);
      $client->save();
      
      return redirect(route('web.settings.index'))->with('password_success', 'Your password has been updated.');
    }

    public function update()
    {

    }
}
