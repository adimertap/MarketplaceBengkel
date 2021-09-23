<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use App\Model\MasterData\JenisKendaraan;
use Illuminate\Http\Request;

class JeniskendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = JenisKendaraan::get();

        return view('admin-views.pages.jeniskendaraan.index',compact('jenis'));
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
        $merk = new JenisKendaraan;
        $merk->jenis_kendaraan = $request->jenis_kendaraan;
        $merk->keterangan = $request->keterangan;

        $merk->save();
        return redirect()->back()->with('messageberhasil','Data Jenis Kendaraan Berhasil ditambah');
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
    public function update(Request $request, $id_jenis_kendaraan)
    {
        $merk =  JenisKendaraan::find($id_jenis_kendaraan);
        $merk->jenis_kendaraan = $request->jenis_kendaraan;
        $merk->keterangan = $request->keterangan;

        $merk->update();
        return redirect()->back()->with('messageberhasil','Data Jenis Kendaraan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jenis_kendaraan)
    {
        $merk =  JenisKendaraan::find($id_jenis_kendaraan);
        $merk->delete();
        return redirect()->back()->with('messagehapus','Data Jenis Kendaraan Berhasil dihapus');
    }
}
