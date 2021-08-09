<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $client_id = \Auth::guard('client')->user()->id;
        $plan = \App\Models\ClientPlan::where('client_id', $client_id)
        ->where('expiry_date', '>', \Carbon\Carbon::now("Asia/Jakarta")->isoFormat('YYYY-MM-DD'))
        ->get();

        $booking = \App\Models\Booking::where('client_id', $client_id)
        ->orderBy('booking_date', 'DESC')
        ->get();

        $transaction = \App\Models\Order::where('client_id', $client_id)
        ->get();

        return view('web.pages.clientHome', [
            'plans' => $plan,
            'bookings' => $booking,
            'transactions' => $transaction,
            'new_user' => session()->get('new_user')
        ]);
    }
}
