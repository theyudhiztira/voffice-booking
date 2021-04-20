<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function aboutUs()
    {
        return view('web.pages.about');
    }

    public function pricing()
    {
        $product = \App\Models\Product::all();

        return view('web.pages.pricing', [
            'products' => $product
        ]);
    }

    public function login()
    {
        return view('web.pages.login');
    }

    public function register(Request $req)
    {
        return view('web.pages.register');
    }
}
