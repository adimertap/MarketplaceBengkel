<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pph21Request;
use App\Model\MasterData\PPH21;
use Illuminate\Http\Request;

class Pph21Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pph21 = PPH21::get();

        return view('admin-views.pages.pph21.index',compact('pph21'));
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
    public function store(Pph21Request $request)
    {
        $pph21 = new PPH21;
        $pph21->nama_pph21 = $request->nama_pph21;
        $pph21->kumulatif_bulanan = $request->kumulatif_bulanan;
        $pph21->besaran_pph21 = $request->besaran_pph21;

        $pph21->save();
        return redirect()->back()->with('messageberhasil','Data Pajak Penghasilan Berhasil ditambahkan');
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
    public function update(Request $request, $id_pph21)
    {
        $pph21 = PPH21::find($id_pph21);
        $pph21->nama_pph21 = $request->nama_pph21;
        $pph21->kumulatif_bulanan = $request->kumulatif_bulanan;
        $pph21->besaran_pph21 = $request->besaran_pph21;

        $pph21->update();
        return redirect()->back()->with('messageberhasil','Data Pajak Penghasilan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pph21)
    {
        $pph21 = PPH21::find($id_pph21);
        $pph21->delete();

        return redirect()->back()->with('messagehapus','Data Pajak Penghasilan Berhasil dihapus');
    }
}
