<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Sparepart;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sparepart = Sparepart::with('Galleries', 'Bengkel', 'Harga')->latest()->take(8)->get();

        // dd($categorymobil);
        // dd($sparepart);
        return view('user-views.pages.home', [
            'sparepart' => $sparepart
        ]);

    }
}
