<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsController extends Controller
{
public function index()
    {

        // $transaksi = Transaksi::with(['User', 'Detailtransaksi', 'Detailtransaksi.Bengkel', 'Detailtransaksi.Galleries', 'Detailtransaksi.Harga'])->where('id_user', Auth::user()->id_user)->orderBy('id_transaksi_online', 'DESC')
        //         ->get();

        // // return $transaksi;
        return view('user-views.pages.maps');
    }
}
