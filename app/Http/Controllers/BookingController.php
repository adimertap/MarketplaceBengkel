<?php

namespace App\Http\Controllers;
use App\Reservasi;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
     public function index()
    {
        $booking = Reservasi::with('Bengkel', 'Kendaraan')->where('id_user', Auth::user()->id_user)->orderBy('id_reservasi', 'DESC')->get();
        // return $booking;
        return view('user-views.pages.booking', [
            'booking' =>$booking
        ]);
    }
   
}
