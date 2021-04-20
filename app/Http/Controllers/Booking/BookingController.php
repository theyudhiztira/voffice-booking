<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $facilities = \App\Models\Facility::all();

        return view('web.pages.booking', [
            'facilities' => $facilities
        ]);
    }

    public function adminIndex()
    {
        $booking = \App\Models\Booking::all();

        return view('admin.pages.booking.index', [
            'bookings' => $booking
        ]);
    }
}
