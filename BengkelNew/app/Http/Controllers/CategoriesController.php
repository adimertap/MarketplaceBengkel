<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Sparepart;
use Illuminate\Support\Facades\DB;
use App\DetailTransaksi;

class CategoriesController extends Controller
{
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
