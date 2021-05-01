<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\DetailTransaksi;
use Illuminate\Support\Facades\Auth;
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
}
