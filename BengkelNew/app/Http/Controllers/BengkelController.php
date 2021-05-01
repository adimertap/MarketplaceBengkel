<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bengkel;
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
        $sparepart = Sparepart::with(['Galleries', 'Harga'])->where('id_bengkel', $bengkel->id_bengkel)->get();
        $perbaikan = Perbaikan::where('id_bengkel', $bengkel->id_bengkel)->get();

        // return $perbaikan;
        return view('user-views.pages.bengkeldetail', [
            'sparepart' =>$sparepart,
            'bengkel'=> $bengkel,
            'perbaikan'=> $perbaikan
        ]);
    }
}
