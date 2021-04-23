<?php

namespace App\Http\Controllers;

use App\Bengkel;
use Illuminate\Http\Request;
use App\Sparepart;
use App\Category;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $request, $id)
    {   
        $sparepart = Sparepart::with(['Galleries', 'Harga', 'Bengkel'])->where('slug', $id) -> firstOrFail();
        // dd($sparepart);
        return view('user-views.pages.detail', [
            'sparepart' =>$sparepart,
        ]);
    }
    
    public function add(Request $request, $id){
        $data = [
            'id_sparepart' => $id,
            'id_user' => Auth::user()->id_user,
        ];

        Cart::create($data);
        return redirect()->route('cart');
    }
}
