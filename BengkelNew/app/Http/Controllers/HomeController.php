<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Sparepart;
use App\DetailTransaksi;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sparepart = Sparepart::with('Galleries','Detailtransaksi','Bengkel', 'Harga')->latest()->take(8)->get();

        $terlaris = DetailTransaksi::with('Sparepart.Galleries','Sparepart.Detailtransaksi' , 'Sparepart.Bengkel', 'Sparepart.Harga')->select(
            '*',
            DB::raw('sum(jumlah_produk) as penjualan')
        )
        ->groupBy('id_sparepart')->orderBy('penjualan', 'DESC')->take(8)
        ->get();

        // return $terlaris;
        // return $sparepart;
        return view('user-views.pages.home', [
            'sparepart' => $sparepart,
            'terlaris'=> $terlaris
        ]);

    }
}
