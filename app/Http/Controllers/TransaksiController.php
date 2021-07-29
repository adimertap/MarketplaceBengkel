<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use Illuminate\Support\Carbon;
use App\DetailTransaksi;
use App\Keuangan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\multiModel;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;


class TransaksiController extends Controller
{
     public function index()
    {

        $transaksi = Transaksi::with(['User', 'Detailtransaksi', 'Detailtransaksi.Bengkel', 'Detailtransaksi.Galleries'])->where('id_user', Auth::user()->id_user)->orderBy('id_transaksi_online', 'DESC')
                ->get();

        // return $transaksi;
        return view('user-views.pages.trans', [
            'transaksi' => $transaksi
        ]);
    }
     public function emulator()
    {
        return view('user-views.pages.emulator');
    }
    public function review(Request $request)
    {
        // return $request;
        foreach($request->review as $key=>$review){
            $trx = DetailTransaksi::findOrFail($request->id_detail_transaksi[$key]);
            $trx->review = $review;
            $trx->status = 'DITERIMA';
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
            $trx->tanggal_transaksi = Carbon::now();
            $trx->save();


        return redirect()->route('transaksi');
    }

    public function cekresi(Request $request)
    {
        $response = Http::asForm()->get('http://api.binderbyte.com/v1/track', [
            'api_key'=> 'f51be4825e6d4ae21fd466c0aa58e38c0711f9cea80fd741bf7fe27cac87f24c',
            'courier'=> $request->kurir,
            'awb' => $request->resi

        ]);

        $cekongkir =  $response['data'] ;
        return json_encode($cekongkir);
    }

    public function bayar(Request $request, $id)
    {
        $item = Transaksi::findOrFail($id);
        

        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        Config::$isSanitized = config('services.midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('services.midtrans.is3ds');

        //buat array untuk midtrans
        $midtrans=[
            'transaction_details' =>[
                'order_id' =>$item->code_transaksi,
                'gross_amount' =>(int) $item->harga_total,
            ],
            'customer_details'=>[
                'first_name'=> Auth::user()->nama_user,
                'email' => Auth::user()->email,
            ],
            'enabled_payments'=>[
                'gopay'
            ],
            'vtweb'=>[]
        ];

        // dd($midtrans);

        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            // dd($paymentUrl);
            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
            
        } 
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }


}
