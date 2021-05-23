<?php

namespace App\Http\Controllers;

use App\Bengkel;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function index()
    {
        return view('user-views.pages.maps');
    }

    public function data()
    {   
        $data = Bengkel::all();
        return $data;
    }

    public function bengkel(Request $request, $id)
    {   
        $bengkel = Bengkel::where('slug', $id)->firstOrFail();
        return view('user-views.pages.maps-detail',[
            'bengkel' => $bengkel]);
    }



}
