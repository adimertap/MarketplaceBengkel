<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use App\Model\MasterData\Diskon;
use Illuminate\Http\Request;

class DiskonControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diskon = Diskon::get();

        $id = Diskon::getId();
            foreach($id as $value);
            $idlama = $value->id_diskon;
            $idbaru = $idlama + 1;
            $blt = date('m');

        $kode_diskon = 'E-BengkelDisc'.'/'.$blt.'-'.$idbaru;

        return view('admin-views.pages.diskon.index',compact('diskon', 'kode_diskon'));
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
        $diskon = new Diskon;
        $diskon->kode_diskon = $request->kode_diskon;
        $diskon->nama_diskon = $request->nama_diskon;
        $diskon->jumlah_diskon = $request->jumlah_diskon;

        $diskon->save();
        return redirect()->back()->with('messageberhasil','Data Diskon Berhasil ditambahkan');
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
    public function update(Request $request, $id_diskon)
    {
        $diskon = Diskon::findOrFail($id_diskon);
        $diskon->nama_diskon = $request->nama_diskon;
        $diskon->jumlah_diskon = $request->jumlah_diskon;
        
        $diskon->update();
        return redirect()->back()->with('messageberhasil','Data Diskon Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_diskon)
    {
        $diskon = Diskon::find($id_diskon);
        $diskon->delete();

        return redirect()->back()->with('messagehapus','Data Diskon Berhasil dihapus');
    }
}
