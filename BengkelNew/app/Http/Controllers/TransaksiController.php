<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\DetailTransaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\multiModel;



class TransaksiController extends Controller
{
     public function index()
    {

        $transaksi = Transaksi::with(['User', 'Detailtransaksi', 'Detailtransaksi.Bengkel', 'Detailtransaksi.Galleries', 'Detailtransaksi.Harga'])->where('id_user', Auth::user()->id_user)->orderBy('id_transaksi_online', 'DESC')
                ->get();

        // return $transaksi;
        return view('user-views.pages.trans', [
            'transaksi' => $transaksi
        ]);
    }
    public function review(Request $request)
    {
        // return $request;
        foreach($request->review as $key=>$review){
            $trx = DetailTransaksi::findOrFail($request->id_detail_transaksi[$key]);
            $trx->review = $review;
            $trx->rating = $request->rating[$key];
            $trx->save();
        }

        return redirect()->route('transaksi');
    }

    public function diterima(Request $request)
    {
        // return $request;
            $trx = Transaksi::findOrFail($request->id_transaksi_online);
            $trx->transaksi_status = 'DITERIMA';
            $trx->save();

        return redirect()->route('transaksi');
    }

    public function cekresi(Request $request)
    {
        $response = Http::asForm()->get('http://api.binderbyte.com/v1/track', [
            'api_key'=> '7670544b4f934178daf4370b0165e656ee26abccf78a7d0f66c38c49df35090f',
            'courier'=> $request->kurir,
            'awb' => $request->resi

        ]);

        $cekongkir =  $response['data'] ;
        return json_encode($cekongkir);
    }


}
