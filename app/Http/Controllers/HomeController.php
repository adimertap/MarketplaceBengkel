<?php

namespace App\Http\Controllers;


use App\Sparepart;
use App\DetailTransaksi;
use Illuminate\Support\Facades\DB;
use App\KecamatanBaru;
use App\KabupatenBaru;
use App\DesaBaru;


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

        // return $sparepart;

        // return $terlaris;
        // return $sparepart;
        return view('user-views.pages.home', [
            'sparepart' => $sparepart,
            'terlaris'=> $terlaris
        ]);

    }
      public function kabupaten_baru($id)
    {
        $kabupaten = KabupatenBaru::where('id_provinsi', '=', $id)->pluck('name', 'id_kabupaten');
        return json_encode($kabupaten);
    }

    public function kecamatan_baru($id)
    {
        $kecamatan = KecamatanBaru::where('id_kabupaten', '=', $id)->pluck('name', 'id_kecamatan');
        return json_encode($kecamatan);
    }

    public function desa_baru($id)
    {
        $desa = DesaBaru::where('id_kecamatan', '=', $id)->pluck('name', 'id_desa');
        return json_encode($desa);
    }
}
