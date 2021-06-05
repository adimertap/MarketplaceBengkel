<?php

namespace App\Http\Controllers;
use App\Reservasi;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
     public function index()
    {
        $reservasi = Reservasi::where('id_user', Auth::user()->id_user)->get();
        return $reservasi;
    }
   
}
