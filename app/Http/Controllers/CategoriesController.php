<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Sparepart;
use Illuminate\Support\Facades\DB;
use App\DetailTransaksi;
use App\SparepartHarga;

class CategoriesController extends Controller

{
   

    public function all(Request $request)
    {

        if($request->urutan== 'Terbaru'){
             $sparepart = Sparepart::with('Galleries', 'Bengkel', 'Harga');
        }else{
            $sparepart = DetailTransaksi::with('Sparepart.Galleries', 'Sparepart.Bengkel', 'Sparepart.Harga');
        }

        if($request->cat){
            $sparepart = $sparepart->where('jenis_sparepart', $request->cat);
        }

        if($request->min){
            $min = $request->min;
            $sparepart = $sparepart->whereHas('Harga', function ($q) {
                        $q->where('harga_jual', '>', "0");
                        });
        }

        return $sparepart->get();





        // if($request->cat){
        //     if($request->max){
        //         if($request->min)
        //     }
        //      $categories = Category::where('jenis_sparepart', $request->cat)->firstOrFail();
        //      $sparepart = Sparepart::with('Galleries', 'Bengkel', 'Harga')->where('id_jenis_sparepart', $categories->id_jenis_sparepart)->paginate(6);
        //     return $categories;
        // }else{
        //     $sparepart = Sparepart::with('Galleries', 'Bengkel', 'Harga')->paginate(6);
        // }
        // return "asd";

        
        // return view('user-views.pages.categories', [
        //     'sparepart' => $sparepart,
        //      'categories' =>$categories
        // ]);
    }

    public function index(Request $request, $slug)
    {

        $categories = Category::where('slug', $slug)->firstOrFail();
        $sparepart = Sparepart::with('Galleries', 'Bengkel', 'Harga')->where('id_jenis_sparepart', $categories->id_jenis_sparepart)->paginate(6);
                return view('user-views.pages.categories', [
            'sparepart' => $sparepart,
            'categories' =>$categories->jenis_sparepart
        ]);
    }

    public function terbaru(Request $request)
    {
        $categories = 'Terbaru';
        $sparepart = Sparepart::with('Galleries', 'Bengkel', 'Harga')->orderBy('id_sparepart', 'DESC')->paginate(6);
        
        // return $sparepart;
        return view('user-views.pages.categories', [
            'sparepart' => $sparepart,
             'categories' =>$categories
        ]);
    }

    public function terlaris(Request $request)
    {
        $categories = 'Terlaris';
        $sparepart = DetailTransaksi::with('Sparepart.Galleries', 'Sparepart.Bengkel', 'Sparepart.Harga')->select('*',DB::raw('sum(jumlah_produk) as penjualan'))
                    ->groupBy('id_sparepart')->orderBy('penjualan', 'DESC')
                    ->paginate(10);

        // return $sparepart;
        return view('user-views.pages.terlaris', [
            'sparepart' => $sparepart,
             'categories' =>$categories
        ]);

    }

}
