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

    public function downloadReport()
    {
      $booking = \App\Models\Booking::all();
      
      $pdf = \PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])->loadView('admin.pdf.report', [
          'bookings' => $booking
      ])->setPaper('a4', 'landscape');
      return $pdf->download('booking-report.pdf');
    }
}
