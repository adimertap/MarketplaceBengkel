<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\DetailSparepart;
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
            $sparepart = DetailSparepart::with(array('Rating','Galleries_one', 'Bengkel','Sparepart' => function($query) use($search )
            {
                $query->where('nama_sparepart', 'LIKE',"%{$search}%");
            }))
                ->where('harga_market', '>', 0)->where('qty_stok', '>', 0)->get();
        }
        else
        {
            $categories = 'All';
             $sparepart = DetailSparepart::with(array('Rating','Galleries_one', 'Bengkel','Sparepart' ))
                ->where('harga_market', '>', 0)->where('qty_stok', '>', 0)->simplePaginate(8);
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
        $sparepart = DetailSparepart::with('Galleries_one', 'Bengkel', 'Rating')->where('harga_market', '>', 0)->where('id_jenis_sparepart', $categories->id_jenis_sparepart)->paginate(8);
        // return $sparepart;
        return view('user-views.pages.categories', [
            'sparepart' => $sparepart,
            'categories' =>$categories->jenis_sparepart
        ]);
    }

    public function terbaru(Request $request)
    {
        $categories = 'Terbaru';
        $sparepart = DetailSparepart::with('Galleries_one', 'Bengkel', 'Rating')->where('harga_market', '>', 0)->orderBy('id_detail_sparepart', 'DESC')->paginate(8);
        
        // return $sparepart;
        return view('user-views.pages.categories', [
            'sparepart' => $sparepart,
             'categories' =>$categories
        ]);
    }

    public function terlaris(Request $request)
    {
        $categories = 'Terlaris';

            $sparepart = DetailTransaksi::with('DetailSparepart.Sparepart','DetailSparepart.Galleries_one','DetailSparepart.Rating' , 'DetailSparepart.Bengkel')->whereNotNull('rating')
            ->whereHas('DetailSparepart', function ($q) {
                        $q->where('harga_market', '>', 0)->where('qty_stok', '>', 0);
                        })->select(
            '*',
            DB::raw('sum(jumlah_produk) as penjualan')
        )
        ->groupBy('id_detail_sparepart')->orderBy('penjualan', 'DESC')->paginate(8);


        // $sparepart = DetailTransaksi::with('DetailSparepart.Galleries_one', 'DetailSparepart.Bengkel', 'DetailSparepart.Rating')->select('*',DB::raw("sum(jumlah_produk) as penjualan"))
        //         ->where('rating','>', '0')->
        //         whereHas('DetailSparepart', function ($q) {
        //                 $q->where('harga_market', '>', 0);
        //                 })
        //             ->groupBy('id_detail_sparepart')->orderBy('penjualan', 'DESC')
        //             ->paginate(10);

        // return $sparepart;
        return view('user-views.pages.terlaris', [
            'sparepart' => $sparepart,
             'categories' =>$categories
        ]);

    }

}
