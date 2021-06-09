<?php

namespace App\Http\Controllers;

use App\DesaBaru;
use App\Kabupaten;
use App\KabupatenBaru;
use App\KecamatanBaru;
use Illuminate\Http\Request;
use App\User;
use App\Provinsi;
use App\ProvinsiBaru;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        
        $user = User::with(['Desa.Kecamatan.Kabupaten.Provinsi'])->where('id_user', Auth::user()->id_user)->firstOrFail();

        // return $user;
        $desa = DesaBaru::where('id_kecamatan', $user->Desa->Kecamatan->id_kecamatan)->get(); //mengambil data kecamatan
        $kecamatan = KecamatanBaru::where('id_kabupaten', $user->Desa->Kecamatan->Kabupaten->id_kabupaten)->get();
        $kabupaten = KabupatenBaru::where('id_provinsi', $user->Desa->Kecamatan->Kabupaten->Provinsi->id_provinsi)->get();
        $provinsi = ProvinsiBaru::get();
        // return $kabupaten;



        return view('user-views.pages.account',[
            'user'=>$user,
            'provinsi'=> $provinsi,
            'kabupaten'=>$kabupaten,
            'kecamatan'=> $kecamatan,
            'desa'=> $desa,
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
        $user->id_desa = $request->id_desa;
        $user->nohp_user = $request->nohp;
        $user->save();

        // return $user;
        return redirect()->route('account-setting')->with('status','Info Akun Berhasil Diubah');

    }
    
}
