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

    public function all()
    {
        // $sparepart =  Sparepart::with('Galleries', 'Bengkel', 'Harga')->get();

        $search= request()->query("search");
        // $categories = $search;

        // if(request()->has('min')){
        //     $sparepart = $sparepart->with(['Galleries', 'Bengkel', 'Harga' => function($query) {
        //                     $query->where('harga_jual', '>', request('min'));} ]);
            
        // }
        
        // $sparepart= $sparepart->get();

        // dd($sparepart->Harga);


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
        $sparepart = Sparepart::with('Galleries', 'Bengkel', 'Harga')->where('id_jenis_sparepart', $categories->id_jenis_sparepart)->paginate(10);
                return view('user-views.pages.categories', [
            'sparepart' => $sparepart,
            'categories' =>$categories->jensi_sparepart
        ]);
    }

    public function terbaru(Request $request)
    {
        $categories = 'Terbaru';
        $sparepart = Sparepart::with('Galleries', 'Bengkel', 'Harga')->orderBy('id_sparepart', 'DESC')->paginate(10);
        
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
