<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KonversiRequest;
use App\Model\MasterData\Konversi;
use Illuminate\Http\Request;

class KonversiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konversi = Konversi::get();

        return view('admin-views.pages.konversi.konversi',compact('konversi'));

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
    public function store(KonversiRequest $request)
    {
        $konversi = new Konversi;
        $konversi->satuan = $request->satuan;
        
        $konversi->save();
        return redirect()->back()->with('messageberhasil','Data Konversi Satuan Berhasil ditambah');
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
    public function update(Request $request, $id_konversi)
    {
        $konversi = Konversi::findOrFail($id_konversi);
        $konversi->satuan = $request->satuan;
        
        $konversi->save();
        return redirect()->back()->with('messageberhasil','Data Konversi Satuan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_konversi)
    {
        $konversi = Konversi::findOrFail($id_konversi);
        $konversi->delete();

        return redirect()->back()->with('messagehapus','Data Konversi Satuan Berhasil dihapus');
    }

    


}
