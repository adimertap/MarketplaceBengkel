<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // $category = Category::take(8)->get();
        // dd($category);
 
        $carts = Cart::with(['Sparepart.Galleries', 'user', 'Sparepart.Harga'])
                ->where('id_user', Auth::user()->id_user)
                ->get();
        // dd($carts);

        return view('user-views.pages.cart',[
            'cart'=> $carts
        ]);
    }

    public function delete(Request $request, $id){
            $cart = Cart::findOrFail($id);
            $cart->delete();
            return redirect()->route('cart');
    }

    public function update(Request $request){
        $item = Cart::findOrFail($request->id_cart);
        $data['jumlah'] = $request->qty;
        $item -> update($data);
        return response()->json(['success'=>'Ajax request submitted successfully']);
    }
}
