<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Sparepart;
use Illuminate\Support\Facades\DB;
use App\DetailTransaksi;

class CategoriesController extends Controller

{
    public function all(Request $request)
    {
        $search= request()->query("search");

        // if($request->urutan== 'Terbaru'){
        //      $sparepart = Sparepart::with('Galleries', 'Bengkel', 'Harga');
        // }else{
        //     $sparepart = DetailTransaksi::with('Sparepart.Galleries', 'Sparepart.Bengkel', 'Sparepart.Harga');
        // }

        // if($request->cat){
        //     $sparepart = $sparepart->where('jenis_sparepart', $request->cat);
        // }

        // if($request->min){
        //     $min = $request->min;
        //     $sparepart = $sparepart->whereHas('Harga', function ($q) {
        //                 $q->where('harga_jual', '>', "0");
        //                 });
        // }

        // return $sparepart->get();





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



        if($search)
        {
            $categories = $search;
            $sparepart = Sparepart::with('Galleries', 'Bengkel', 'Harga')->orderBy('id_sparepart', 'DESC')->where('nama_sparepart', 'LIKE', "%{$search}%")->simplePaginate(8); 
        }
        else
        {
            $categories = 'All';
            $sparepart = Sparepart::with('Galleries', 'Bengkel', 'Harga')->orderBy('id_sparepart', 'DESC')->simplePaginate(8); 
        }
       
        // return $sparepart;
        return view('user-views.pages.categories', [
            'sparepart' => $sparepart,
             'categories' =>$categories
        ]);
    }

    public function index(Request $request, $slug)
    {

        $categories = Category::where('slug', $slug)->firstOrFail();
        $sparepart = Sparepart::with('Galleries_one', 'Bengkel', 'Harga', 'Rating')->where('id_jenis_sparepart', $categories->id_jenis_sparepart)->paginate(6);
        // return $sparepart;
        return view('user-views.pages.categories', [
            'sparepart' => $sparepart,
            'categories' =>$categories->jenis_sparepart
        ]);
    }

    public function terbaru(Request $request)
    {
        $categories = 'Terbaru';
        $sparepart = Sparepart::with('Galleries_one', 'Bengkel', 'Harga', 'Rating')->orderBy('id_sparepart', 'DESC')->paginate(6);
        
        // return $sparepart;
        return view('user-views.pages.categories', [
            'sparepart' => $sparepart,
             'categories' =>$categories
        ]);
    }

    public function terlaris(Request $request)
    {
        $categories = 'Terlaris';
        $sparepart = DetailTransaksi::with('Sparepart.Galleries_one', 'Sparepart.Bengkel', 'Sparepart.Harga', 'Sparepart.Rating')->select('*',DB::raw("sum(jumlah_produk) as penjualan"))->where('rating','>', '0')
                    ->groupBy('id_sparepart')->orderBy('penjualan', 'DESC')
                    ->paginate(10);

        // return $sparepart;
        return view('user-views.pages.terlaris', [
            'sparepart' => $sparepart,
             'categories' =>$categories
        ]);

    }

}
