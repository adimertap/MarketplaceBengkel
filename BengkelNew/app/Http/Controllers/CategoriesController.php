<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Sparepart;

class CategoriesController extends Controller
{
    public function index(Request $request, $slug)
    {

        $categories = Category::where('slug', $slug)->firstOrFail();
        $sparepart = Sparepart::with('Galleries', 'Bengkel', 'Harga')->where('id_jenis_sparepart', $categories->id_jenis_sparepart)->paginate(10);
                return view('user-views.pages.categories', [
            'sparepart' => $sparepart,
            'categories' =>$categories
        ]);
    }
}
