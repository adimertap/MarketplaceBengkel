<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bengkel;
use App\DetailTransaksi;
use App\Sparepart;
use App\Perbaikan;

class BengkelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)

    {
        $bengkel = Bengkel::where('slug', $id)->firstOrFail();
        $sparepart = Sparepart::with(['Galleries', 'Harga', 'Detailtransaksi'])->where('id_bengkel', $bengkel->id_bengkel)->get();
        $perbaikan = Perbaikan::where('id_bengkel', $bengkel->id_bengkel)->get();

        // return $bengkel;
        return view('user-views.pages.bengkel', [
            'sparepart' =>$sparepart,
            'bengkel'=> $bengkel,
            'perbaikan'=> $perbaikan
        ]);
    }
}
