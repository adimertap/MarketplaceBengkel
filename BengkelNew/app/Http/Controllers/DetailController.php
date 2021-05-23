<?php

namespace App\Http\Controllers;

use App\Bengkel;
use Illuminate\Http\Request;
use App\Sparepart;
use App\Category;
use App\Cart;
use App\Carts;
use App\Detailcarts;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $request, $id)
    {   
        $sparepart = Sparepart::with(['Galleries','Detailtransaksi.Transaksi.User', 'Harga', 'Bengkel'])->where('slug', $id) -> firstOrFail();
        // return $sparepart;
        return view('user-views.pages.detail', [
            'sparepart' =>$sparepart,
        ]);
    }
    
    public function add($id){
        $bengkel= Sparepart::select('id_bengkel')->where('id_sparepart', $id)->get();
        $carts = Carts::where('id_bengkel', $bengkel->first()->id_bengkel)->where('id_user', Auth::user()->id_user)->first();
        
        if($carts){
            $check = Detailcarts::where('id_carts', $carts->id_carts )->where('id_sparepart', $id)->first();
            if(!$check){
                $data = [
                    'id_sparepart' => $id,
                    'id_carts' => $carts->id_carts
                ];
                Detailcarts::create($data);
            }
        }else{
            $cart = Carts::create([
                'id_bengkel' => $bengkel->first()->id_bengkel,
                'id_user' => Auth::user()->id_user
            ]);

            $data = [
                'id_sparepart' => $id,
                'id_carts' => $cart->id_carts
            ];
            Detailcarts::create($data);
        }
      
        return redirect()->route('cart');
    }
}
