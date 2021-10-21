<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MerkRequest;
use App\Sparepart;
use App\SparepartMerk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merk = SparepartMerk::with('jenissparepart')->where('status_merk','=','Aktif')->get();
        $merkdiajukan = SparepartMerk::where('status_merk','=','Diajukan')->get();
        $jenissparepart = Category::where('status_jenis','=','Aktif')->get();

        $countmerkaktif = SparepartMerk::where('status_merk','=','Aktif')->count();
        $countmerkdiajukan = SparepartMerk::where('status_merk','=','Diajukan')->count();

        $id = SparepartMerk::getId();
        foreach($id as $value);
        $idlama = $value->id_merk;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_merk = 'MRK-'.$blt.'/'.$idbaru;

        return view('admin-views.pages.merk.index',compact('merk','merkdiajukan','countmerkaktif','countmerkdiajukan','jenissparepart','kode_merk'));
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
    public function store(MerkRequest $request)
    {
        $merksparepart = new SparepartMerk;
        $merksparepart->id_jenis_sparepart = $request->id_jenis_sparepart;
        $merksparepart->kode_merk = $request->kode_merk;
        $merksparepart->merk_sparepart = $request->merk_sparepart;
        $merksparepart->status_merk = 'Aktif';

        $merksparepart->save();
        return redirect()->back()->with('messageberhasil','Data Merk Sparepart Berhasil ditambahkan');
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
    public function update(Request $request, $id_merk)
    {
        $merksparepart = SparepartMerk::findOrFail($id_merk);
        $merksparepart->id_jenis_sparepart = $request->id_jenis_sparepart;
        $merksparepart->kode_merk = $request->kode_merk;
        $merksparepart->merk_sparepart = $request->merk_sparepart;

        $merksparepart->update();
        return redirect()->back()->with('messageberhasil','Data Merk Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_merk)
    {
        $merksparepart = SparepartMerk::findOrFail($id_merk);
        $merksparepart->delete();

        return redirect()->back()->with('messagehapus','Data Merk Berhasil dihapus');
    }

    public function setStatus(Request $request, $id_merk)
    {

        $item = SparepartMerk::findOrFail($id_merk);
        $item->status_merk = $request->status_merk;
        
        $item->save();
        return redirect()->back()->with('messageberhasil', 'Data Pengajuan Merk Sparepart Berhasil di Proses');
    }

}
