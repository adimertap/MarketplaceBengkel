<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Provinsi;
use App\Kabupaten;
use App\Cart;
use App\Carts;
use App\Detailcarts;
use App\Transaksi;
use App\DetailTransaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\SoftDeletes;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;


class CheckoutController extends Controller
{
    use SoftDeletes;
    public function process(Request $request, $id)
    {
        //save user data
        // dd($request);
        $code_transaksi = 'STORE'.mt_rand(00000,99999);
        $cart = Carts::with('user', 'Bengkel')->where('id_carts', $id)->first();

        $items = Detailcarts::with(['Sparepart.Galleries_one', 'Sparepart.Harga'])
                ->where('id_carts', $id)
                ->get();

        //buat transaksi
        $transaksi = Transaksi::create([
            'id_user'=> Auth::user()->id_user,
            'harga_pengiriman'=> $request->harga_pengiriman,
            'harga_total'=> $request->harga_total,
            'code_transaksi'=> $code_transaksi,
            'transaksi_status'=>  "PENDING",
            'resi'=> '',
            'nama_penerima'=> $request->nama_penerima,
            'alamat_penerima'=> $request->alamat_penerima,
            'nohp_penerima'=> $request->nohp_penerima,
            'id_kabupaten'=> $request->id_kabupaten,
            'kurir_pengiriman'=> $request->kurir_pengiriman,
            'id_bengkel'=> $cart->id_bengkel

        ]);

        // dd($transaksi);
        foreach($items as $item){
            $trx = 'TRX_' . mt_rand(00000, 99999);
            DetailTransaksi::create([
                'id_transaksi_online' => $transaksi -> id_transaksi_online,
                'id_sparepart' => $item->id_sparepart,
                'jumlah_produk' => $item->jumlah,
                'id_review' => NULL,
                'status' => 'PENDING',
                'code_detail_transaksi' => $trx,
            ]);
        }

        // Detailcarts::where('id_carts',$id)->delete();
        // $cart->delete();
        

        //configurasi midtrans
        // Set your Merchant Server Key
       $data = Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        Config::$isSanitized = config('services.midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('services.midtrans.is3ds');

        //buat array untuk midtrans
        $midtrans=[
            'transaction_details' =>[
                'order_id' =>$code_transaksi,
                'gross_amount' =>(int) $request->harga_total,
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
            header('Location: ' . $paymentUrl);
            exit();
            } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback(Request $request)
    {
        
    }

    public function index($id)
    {
        $provinsi = Provinsi::all();

        $cart = Carts::with('user', 'Bengkel')->where('id_carts', $id)->first();

        $item = Detailcarts::with(['Sparepart.Galleries_one', 'Sparepart.Harga'])->where('id_carts', $id)
                ->get();
        // return $item;

        // $carts = Cart::with(['Sparepart.Galleries','Sparepart.Bengkel', 'user', 'Sparepart.Harga'])
        //         ->where('id_user', Auth::user()->id_user)
        //         ->get();
                        
        return view('user-views.pages.checkout',[
            'provinsi' => $provinsi,
            'items'=> $item,
            'cart' =>$cart
            ]);

    }
    
    public function kabupaten ($id){
        $kabupaten = Kabupaten::where('id_provinsi', '=', $id)->pluck('nama_kabupaten', 'id_kabupaten');
        return json_encode($kabupaten);
    }

    public function ongkir (Request $request){
        $carts = Cart::with(['Sparepart.Galleries','Sparepart.Bengkel', 'user', 'Sparepart.Harga'])
                ->where('id_user', Auth::user()->id_user)
                ->get();
        $weight = 0;
        foreach ($carts as $item) {
            $weight += ($item->jumlah)*($item->Sparepart->berat_sparepart);
        }
        $origin = $item->first()->Sparepart->Bengkel->id_kabupaten;
        $destination = $request->kabupaten;
        $courier = $request->kurir;

        $response = Http::asForm()->withHeaders([
            'key'=> '941b51f4786c2ad2cf4e8a43828be7c4'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin'=> $origin,
            'destination' => $destination, 
            'weight' => $weight, 
            'courier' => $courier
        ]);

        $cekongkir =  $response['rajaongkir']['results'][0]['costs'];
        return json_encode($cekongkir);

    }
}
