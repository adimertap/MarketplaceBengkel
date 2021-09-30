<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Sparepart;
use App\Carts;
use App\Detailcarts;
use App\DetailSparepart;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $request, $id)
    {   
        $sparepart = DetailSparepart::with(['Galleries','Detailtransaksi.Transaksi.User', 'Bengkel'])->where('slug', $id) -> firstOrFail();
        // return $sparepart;
        return view('user-views.pages.detail', [
            'sparepart' =>$sparepart,
        ]);
    }
    
    public function add($id){
        $bengkel= DetailSparepart::select('id_bengkel')->where('id_detail_sparepart', $id)->get();
        $carts = Carts::where('id_bengkel', $bengkel->first()->id_bengkel)->where('id_user', Auth::user()->id_user)->first();
        
        if($carts){
            $check = Detailcarts::where('id_carts', $carts->id_carts )->where('id_detail_sparepart', $id)->first();
            if(!$check){
                $data = [
                    'id_detail_sparepart' => $id,
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
                'id_detail_sparepart' => $id,
                'id_carts' => $cart->id_carts
            ];
            Detailcarts::create($data);
        }
      
        return redirect()->route('cart');
    }
}
