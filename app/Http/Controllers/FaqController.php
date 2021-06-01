<?php

namespace App\Http\Controllers;

use App\Bengkel;
use App\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function index($id)
    {
        $bengkel=Bengkel::where('slug', $id)->firstOrFail();
        $faq =FAQ::with(['User'])->where('id_bengkel', $bengkel->id_bengkel)->orderBy('id_fo_faq', 'DESC')->get();
       
        // return $faq;
        return view('user-views.pages.faq',[
            'bengkel'=>$bengkel,
            'faq'=> $faq,
        ]);
    }

    public function send(Request $request)
    {
        $data = [
            'id_user' => Auth::user()->id_user,
            'pertanyaan_faq'=>$request->pertanyaan_faq,
            'id_bengkel'=>$request->id_bengkel
        ];
        FAQ::create($data);    

        // return $request->slug;

        return redirect()->back();
    }
}
