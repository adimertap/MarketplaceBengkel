<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use App\Model\MasterData\JenisPerbaikan;
use Illuminate\Http\Request;

class JenisperbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisperbaikan = JenisPerbaikan::get();
        $jenisperbaikanpengajuan = JenisPerbaikan::where('status','=','Diajukan')->get();

        $jenisperbaikandiajukan = JenisPerbaikan::where('status','=','Diajukan')->count();
        $jenisperbaikanaktif = JenisPerbaikan::where('status','=','Aktif')->count();

        $id = JenisPerbaikan::getId();
        foreach($id as $value);
        $idlama = $value->id_jenis_perbaikan;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kodeperbaikan = 'JP-'.$blt.'/'.$idbaru;

        return view('admin-views.pages.jenisperbaikan.index',compact('jenisperbaikan','jenisperbaikandiajukan','jenisperbaikanaktif','jenisperbaikanpengajuan','kodeperbaikan'));
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
        $jenisperbaikan = new JenisPerbaikan;
        $jenisperbaikan->kode_jenis_perbaikan = $request->kode_jenis_perbaikan;
        $jenisperbaikan->nama_jenis_perbaikan = $request->nama_jenis_perbaikan;
        $jenisperbaikan->group_jenis_perbaikan = $request->group_jenis_perbaikan;
        $jenisperbaikan->harga_jenis_perbaikan = $request->harga_jenis_perbaikan;
        $jenisperbaikan->status = 'Aktif';

        $jenisperbaikan->save();
        return redirect()->back()->with('messageberhasil','Data Jenis Perbaikan Berhasil ditambahkan');
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
    public function update(Request $request, $id_jenis_perbaikan)
    {
        $jenisperbaikan = JenisPerbaikan::find($id_jenis_perbaikan);
        $jenisperbaikan->kode_jenis_perbaikan = $request->kode_jenis_perbaikan;
        $jenisperbaikan->nama_jenis_perbaikan = $request->nama_jenis_perbaikan;
        $jenisperbaikan->group_jenis_perbaikan = $request->group_jenis_perbaikan;
        $jenisperbaikan->harga_jenis_perbaikan = $request->harga_jenis_perbaikan;
        $jenisperbaikan->status = 'Aktif';

        $jenisperbaikan->update();
        return redirect()->back()->with('messageberhasil','Data Jenis Perbaikan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jenis_perbaikan)
    {
        $perbaikan = JenisPerbaikan::find($id_jenis_perbaikan);
        $perbaikan->delete();

        return redirect()->back()->with('messagehapus','Data Jenis Perbaikan Berhasil dihapus');
    }

    public function setStatus(Request $request, $id_jenis_perbaikan)
    {

        $item = JenisPerbaikan::find($id_jenis_perbaikan);
        $item->status = $request->status;
        
        $item->save();
        return redirect()->back()->with('messageberhasil', 'Data Jenis Perbaikan Berhasil di Proses');
    }
}
