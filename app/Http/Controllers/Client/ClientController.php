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

    public function store()
    {

    }

    public function update()
    {

    }
}
