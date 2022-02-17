<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;

use App\Http\Requests\Admin\CategoryRequest;
use App\Keuangan;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $penarikan = Keuangan::with(['Bengkel', 'Bank.Bank'])->orderBy('id_keuangan', 'DESC')->get();
        // return $penarikan;
        return view('admin-views.pages.keuangan.index',compact('penarikan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ;
        $item = Keuangan::findOrFail($id);
        if($request->profile_avatar == NULL){
            $item->photo = "";
        }elseif($request->hasfile('profile_avatar')){
            $name=$request->file("profile_avatar")->getClientOriginalName();
            $request->file("profile_avatar")->move(public_path().'/image/', $name);
            $item->photo= $name;
        }
        
        $item->status = $request->status;
        $item->keterangan = $request->keterangan;
        
        $item->save();
        //  return $item;
        
        // $item -> update($data);

        return redirect()->route('keuangan.index')
            ->with('messageberhasil','penarikan saldo berhasil diubah');
    }

    
}
