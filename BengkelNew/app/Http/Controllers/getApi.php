<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\City;
use App\Province;


class getApi extends Controller
{
    public function register(){
       
        $provinsi = Province::all();
        return view('pages.register', compact('provinsi')) ;
    }
    
    public function index(Request $request){
        // dd($request->all());

        $origin = $request->kota_asal;
        $destination = $request->kota_tujuan;
        $weight = $request->berat;
        $courier = $request->kurir;

        $response = Http::asForm()->withHeaders([
            'key'=> '941b51f4786c2ad2cf4e8a43828be7c4'
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin'=> $origin,
            'destination' => $destination, 
            'weight' => $weight, 
            'courier' => $courier
        ]);

        // $cekongkir =  $response['rajaongkir']['results'][0]['costs'];
        $provinsi = Province::all();
        return view('pages.checkout', compact('provinsi', 'cekongkir')) ;
    }
    
    public function ajax ($id){
        $cities = City::where('province_id', '=', $id)->pluck('city_name', 'id');

        return json_encode($cities);

    }

    public function ongkir (Request $request){
        $origin = $request->kota_asal;
        $destination = $request->kota_tujuan;
        $weight = $request->berat;
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
