<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bengkel;
use App\Customer;
use App\CustomerBengkel;
use App\DetailSparepart;
use App\DetailTransaksi;
use App\Sparepart;
use App\Perbaikan;
use App\Kendaraan;
use App\Model\MasterData\JenisPerbaikan;
use App\Model\MasterData\Kendaraan as MasterDataKendaraan;
use App\Reservasi;
use Illuminate\Support\Facades\Auth;

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
        $sparepart = DetailSparepart::with(['Galleries_one', 'Detailtransaksi'])->where('harga_market', '>', 0)->where('id_bengkel', $bengkel->id_bengkel)->get();
        // $perbaikan = JenisPerbaikan::where('id_bengkel', $bengkel->id_bengkel)->get();
        $perbaikan = JenisPerbaikan::get();

        // return $sparepart;

        return view('user-views.pages.bengkel', [
            'sparepart' =>$sparepart,
            'bengkel'=> $bengkel,
            'perbaikan'=> $perbaikan
        ]);
    }


    public function reservasi($id)
    {
        $id_bengkel = Bengkel::where('slug', $id)->firstOrFail();
        $bengkel = Bengkel::where('id_bengkel', $id_bengkel->id_bengkel)->first();
        $kendaraan = MasterDataKendaraan::where('id_bengkel', $id_bengkel->id_bengkel)->get();
        $code = 'RSV-' .$id_bengkel->id_bengkel. mt_rand(00000, 99999);

        return view('user-views.pages.reservasi', [
            'kendaraan' =>$kendaraan,
            'bengkel'=> $bengkel,
            'code'=>$code
        ]);
    }
     public function kirim(Request $request,$id)
    {
        // return $request;
        $id_bengkel = Bengkel::where('slug', $id)->firstOrFail();
        $customer = CustomerBengkel::where('id_user', Auth::user()->id_user)->first();
        if(!$customer){
            $CustomerBengkel= CustomerBengkel::create([
                'nama_customer' => Auth::user()->nama_user,
                'email_customer' => Auth::user()->email,
                'nohp_customer' => Auth::user()->nohp_user,
                'alamat_customer' => Auth::user()->alamat_user,
                'id_bengkel' => $id_bengkel->id_bengkel,
                'id_user' => Auth::user()->id_user,
            ]);

            Reservasi::create([
               'id_bengkel'=> $id_bengkel->id_bengkel, 
               'id_kendaraan' => $request->id_kendaraan, 
               'id_user'=>Auth::user()->id_user,
               'id_customer_bengkel' =>$CustomerBengkel->id_customer_bengkel, 
               'no_plat' => $request->no_plat,
                'kode_reservasi' => $request->code,
               'status' => 'PENDING',
               'keluhan_kendaraan' => $request->keluhan
            ]);

        }else{
             Reservasi::create([
               'id_bengkel'=> $id_bengkel->id_bengkel, 
               'id_kendaraan' => $request->id_kendaraan, 
               'id_user'=>Auth::user()->id_user,
               'id_customer_bengkel' =>$customer->id_customer_bengkel, 
               'no_plat' => $request->no_plat,
                'kode_reservasi' => $request->code,
               'status' => 'PENDING',
               'keluhan_kendaraan' => $request->keluhan
            ]);

        }
        return redirect()->route('booking')->with('status','Reservasi Berhasil Dibuat');
    }
}
