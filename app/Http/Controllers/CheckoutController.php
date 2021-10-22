<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DesaBaru;
use App\KecamatanBaru;
use App\KabupatenBaru;
use App\ProvinsiBaru;
use App\Kabupaten;
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
use Midtrans\Notification;


class CheckoutController extends Controller
{
    use SoftDeletes;
    public function process(Request $request, $id)
    {
        //save user data
        // dd($request);
        $code_transaksi = 'STORE'.mt_rand(00000,99999);
        $cart = Carts::with('user', 'Bengkel')->where('id_carts', $id)->first();

        $items = Detailcarts::with(['DetailSparepart.Galleries_one'])
                ->where('id_carts', $id)
                ->get();

        //buat transaksi
        $transaksi = Transaksi::create([
            'id_user'=> Auth::user()->id_user,
            'harga_pengiriman'=> $request->harga_pengiriman,
            'harga_total'=> $request->harga_total,
            'code_transaksi'=> $code_transaksi,
            'transaksi_status'=>  "MENUNGGU",
            'resi'=> '',
            'nama_penerima'=> $request->nama_penerima,
            'alamat_penerima'=> $request->alamat_penerima,
            'nohp_penerima'=> $request->nohp_penerima,
            'id_desa'=> $request->id_desa,
            'kurir_pengiriman'=> $request->kurir_pengiriman,
            'id_bengkel'=> $cart->id_bengkel

        ]);

        // dd($transaksi);
        foreach($items as $item){
            $trx = 'TRX_' . mt_rand(00000, 99999);
            DetailTransaksi::create([
                'id_transaksi_online' => $transaksi -> id_transaksi_online,
                'id_detail_sparepart' => $item->id_detail_sparepart,
                'jumlah_produk' => $item->jumlah,
                'id_review' => NULL,
                'status' => 'CANCELLED',
                'code_detail_transaksi' => $trx,
            ]);
        }

        Detailcarts::where('id_carts',$id)->delete();
        $cart->delete();
        

        //configurasi midtrans
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
                'order_id' =>$transaksi->id_transaksi_online,
                'gross_amount' =>(int) $request->harga_total + (int) $request->harga_pengiriman,
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
            // return Redirect::to($paymentUrl);
            
        } 
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback(Request $request)
    {
        //set konfogurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        //instance midtrans notification
        $notification = new Notification();
       
        //assign ke variabel untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        //cari transaksi berdasarkan id

        $transaksi = Transaksi::findOrFail($order_id);
        //handle notificarion status
        if($status == 'capture'){
            if($type == 'credit_card'){
                if($fraud == 'challenge'){
                    $transaksi->transaksi_status = "MENUNGGU";
                }else{
                    $transaksi->transaksi_status = "DIBAYAR";
                }
            }
        }else if($status == 'settlement'){
            $transaksi->transaksi_status="DIBAYAR";
        }else if($status == 'pending'){
             $transaksi->transaksi_status="MENUNGGU";
        }else if($status == 'deny'){
             $transaksi->transaksi_status="CANCELLED";
        }else if($status == 'expire'){
             $transaksi->transaksi_status="CANCELLED";
        }else if($status == 'cancel'){
             $transaksi->transaksi_status="CANCELLED";
        }
        //simpan transaksi

        $transaksi->save();
    }

    public function index($id)
    {
        $cart = Carts::with('user.Desa.Kecamatan.Kabupaten.Provinsi', 'Bengkel')->where('id_carts', $id)->first();

        // return $cart;
        $item = Detailcarts::with(['DetailSparepart.Galleries_one', 'DetailSparepart.Sparepart'])->where('id_carts', $id)
                ->get();

        $desa = DesaBaru::where('id_kecamatan', $cart->user->Desa->Kecamatan->id_kecamatan)->get(); //mengambil data kecamatan
        $kecamatan = KecamatanBaru::where('id_kabupaten', $cart->user->Desa->Kecamatan->Kabupaten->id_kabupaten)->get();
        $kabupaten = KabupatenBaru::where('id_provinsi', $cart->user->Desa->Kecamatan->Kabupaten->Provinsi->id_provinsi)->get();
        $provinsi = ProvinsiBaru::get();
        return view('user-views.pages.checkout',[
            'provinsi'=> $provinsi,
            'kabupaten'=>$kabupaten,
            'kecamatan'=> $kecamatan,
            'desa'=> $desa,
            'items'=> $item,
            'cart' =>$cart
            ]);

    }
    
    public function kabupaten ($id){
        $kabupaten = Kabupaten::where('id_provinsi', '=', $id)->pluck('nama_kabupaten', 'id_kabupaten');
        return json_encode($kabupaten);
    }

    public function ongkir (Request $request){
        $id = $request->id_cart;
        $cart = Carts::with('user', 'Bengkel.Desa.Kecamatan.Kabupaten')->where('id_carts', $id)->first();

        $items = Detailcarts::with(['DetailSparepart.Sparepart'])
                ->where('id_carts', $id)
                ->get();

        $weight = 0;
        foreach ($items as $item) {
            $weight += ($item->jumlah)*($item->DetailSparepart->Sparepart->dimensi_berat);
        }

        $kabupaten_name = $cart->Bengkel->Desa->Kecamatan->kabupaten->name;
        if(substr($kabupaten_name, 0, 9) == 'KABUPATEN'){
            $kabupaten_cut = substr($kabupaten_name,10);
        }else{
             $kabupaten_cut = substr($kabupaten_name,6);
        }
        $origin = Kabupaten::where('nama_kabupaten', ucwords($kabupaten_cut))->first();

        $tujuan_id = $request->kabupaten;
        $tujuan_name = KabupatenBaru::where('id_kabupaten', $tujuan_id)->first();
        if(substr($tujuan_name->name, 0, 9) == 'KABUPATEN'){
            $tujuan_cut = substr($tujuan_name->name,10);
        }else{
             $tujuan_cut = substr($tujuan_name->name,5);
        }
        $destination = Kabupaten::where('nama_kabupaten', ucwords($tujuan_cut))->first();
        $courier = $request->kurir;



        $response = Http::asForm()->withHeaders([
            'key'=> '941b51f4786c2ad2cf4e8a43828be7c4'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin'=> $origin->id_kabupaten,
            'destination' => $destination->id_kabupaten, 
            'weight' => $weight, 
            'courier' => $courier
        ]);
        // return $items;
        // $cekongkir =  $response->body();
        $cekongkir =  $response['rajaongkir']['results'][0]['costs'];
        return json_encode($cekongkir);

    }
}
