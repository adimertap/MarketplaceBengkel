<?php

namespace App\Http\Controllers;

use App\Kabupaten;
use Illuminate\Http\Request;
use App\User;
use App\Provinsi;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $provinsi = Provinsi::get();
        
        $user = User::with(['Kabupaten.Provinsi'])->where('id_user', Auth::user()->id_user)->firstOrFail();
        $kabupaten = Kabupaten::where('id_provinsi', $user->Kabupaten->id_provinsi)->get();
        // return $kabupaten;

        return view('user-views.pages.account',[
            'user'=>$user,
            'provinsi'=> $provinsi,
            'kabupaten'=>$kabupaten
        ]);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id_user);
        
        if($request->profile_avatar == NULL && $request->profile_avatar_remove == '1'){
            $user->foto = "";
        }elseif($request->hasfile('profile_avatar')){
            $name=$request->file("profile_avatar")->getClientOriginalName();
            $request->file("profile_avatar")->move(public_path().'/image/', $name);
            $user->foto= $name;
        }
        $user->nama_user = $request->nama_user;
        $user->email = $request->email;
        $user->alamat_user = $request->alamat_user;
        $user->id_kabupaten = $request->id_kabupaten;
        $user->nohp_user = $request->nohp;
        $user->save();

        // return $user;
        return redirect()->route('account-setting');

    }
    
}
