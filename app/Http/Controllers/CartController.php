<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Cart;
use App\Carts;
use App\Detailcarts;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Carts::with(['Detailcarts.Sparepart.Galleries_one', 'Bengkel'])
                ->where('id_user', Auth::user()->id_user)
                ->get();


        // return $carts;

        return view('user-views.pages.cart',[
            'carts'=> $carts
        ]);
    }

    public function delete(Request $request, $id){

            $cart = Detailcarts::findOrFail($id);
            $cart->delete();

            $check = Detailcarts::where('id_carts', $cart->id_carts)->first();
            if(!$check){
                // return 'ada';
                $carts = Carts::findOrFail($cart->id_carts);
                $carts->delete();
            }
            return redirect()->route('cart');
    }

    public function update(Request $request){
        $item = Detailcarts::findOrFail($request->id_detail_carts);
        $data['jumlah'] = $request->qty;
        $item -> update($data);
        return response()->json(['success'=>'Ajax request submitted successfully']);
    }
}
