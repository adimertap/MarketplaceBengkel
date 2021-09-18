<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use App\Model\MasterData\MerkKendaraan;
use Illuminate\Http\Request;

class MerkkendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merk = MerkKendaraan::get();
        $id = MerkKendaraan::getId();
        foreach($id as $value);
        $idlama = $value->id_merk_kendaraan;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_merk = 'MRKKD-'.$blt.'/'.$idbaru;

        return view('admin-views.pages.merkkendaraan.index',compact('merk','kode_merk'));
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
    public function store(Request $request)
    {
        $merk = new MerkKendaraan;
        $merk->kode_merk_kendaraan = $request->kode_merk_kendaraan;
        $merk->merk_kendaraan = $request->merk_kendaraan;

        $merk->save();
        return redirect()->back()->with('messageberhasil','Data Merk Kendaraan Berhasil ditambah');
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
    public function update(Request $request, $id_merk_kendaraan)
    {
        $merk = MerkKendaraan::find($id_merk_kendaraan);
        $merk->kode_merk_kendaraan = $request->kode_merk_kendaraan;
        $merk->merk_kendaraan = $request->merk_kendaraan;

        $merk->save();
        return redirect()->back()->with('messageberhasil','Data Merk Kendaraan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_merk_kendaraan)
    {
        $merk = MerkKendaraan::findOrFail($id_merk_kendaraan);
        $merk->delete();

        return redirect()->back()->with('messagehapus','Data Merk Kendaraan Berhasil dihapus');
    }
}
