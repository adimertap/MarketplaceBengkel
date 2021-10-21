<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use App\Model\MasterData\JenisKendaraan;
use App\Model\SingleSignOn\JenisBengkel;
use Illuminate\Http\Request;

class JeniskendaraanControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenismobil = JenisKendaraan::with('JenisBengkel')->where('id_jenis_bengkel','=','1')->get();
        $jenismotor = JenisKendaraan::with('JenisBengkel')->where('id_jenis_bengkel','=','2')->get();

        $jenis_bengkel = JenisBengkel::get();

        return view('admin-views.pages.jeniskendaraan.index',compact('jenismobil','jenismotor','jenis_bengkel'));
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
        $jenis = new JenisKendaraan;
        $jenis->jenis_kendaraan = $request->jenis_kendaraan;
        $jenis->keterangan = $request->keterangan;
        $jenis->id_jenis_bengkel = $request->id_jenis_bengkel;

        $jenis->save();
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
        $jenis =  JenisKendaraan::find($id_jenis_kendaraan);
        $jenis->jenis_kendaraan = $request->jenis_kendaraan;
        $jenis->keterangan = $request->keterangan;
        $jenis->id_jenis_bengkel = $request->id_jenis_bengkel;

        $jenis->update();
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
        $jenis =  JenisKendaraan::find($id_jenis_kendaraan);
        $jenis->delete();
        return redirect()->back()->with('messagehapus','Data Jenis Kendaraan Berhasil dihapus');
    }
}
