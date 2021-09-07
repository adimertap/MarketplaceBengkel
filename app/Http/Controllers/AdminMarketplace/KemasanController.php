<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KemasanRequest;
use App\Model\MasterData\Kemasan;
use Illuminate\Http\Request;

class KemasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kemasan = Kemasan::where('status_kemasan','=','Aktif')->get();
        $kemasandiajukan = Kemasan::where('status_kemasan','=','Diajukan')->get();
        $countkemasanaktif = Kemasan::where('status_kemasan','=','Aktif')->count();
        $countkemasandiajukan = Kemasan::where('status_kemasan','=','Diajukan')->count();

        return view('admin-views.pages.kemasan.kemasan',compact('kemasan','kemasandiajukan','countkemasanaktif','countkemasandiajukan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KemasanRequest $request)
    {
        $kemasan = new Kemasan;
        $kemasan->nama_kemasan = $request->nama_kemasan;
        $kemasan->status_kemasan = 'Aktif';

        $kemasan->save();
        return redirect()->back()->with('messageberhasil','Data Kemasan Berhasil ditambah');
    }

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
    public function update(Request $request, $id_kemasan)
    {
        $kemasan = Kemasan::findOrFail($id_kemasan);
        $kemasan->nama_kemasan = $request->nama_kemasan;
        
        $kemasan->save();
        return redirect()->back()->with('messageberhasil','Data Kemasan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kemasan)
    {
        $kemasan = Kemasan::findOrFail($id_kemasan);
        $kemasan->delete();

        return redirect()->back()->with('messagehapus','Data Kemasan Berhasil dihapus');
    }

    public function setStatus(Request $request, $id_kemasan)
    {

        $item = Kemasan::findOrFail($id_kemasan);
        $item->status_kemasan = $request->status_kemasan;
        
        $item->save();
        return redirect()->back()->with('messageberhasil', 'Data Pengajuan Kemasan Berhasil di Proses');
    }



}
