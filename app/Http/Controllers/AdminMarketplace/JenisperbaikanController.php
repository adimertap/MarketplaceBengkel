<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use App\Model\MasterData\JenisPerbaikan;
use App\Model\SingleSignOn\JenisBengkel;
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
        $jenisperbaikanmobil = JenisPerbaikan::with('JenisBengkel')->where('status','=','Aktif')->where('id_jenis_bengkel','=','1')->get();
        $jenisperbaikanmotor = JenisPerbaikan::with('JenisBengkel')->where('status','=','Aktif')->where('id_jenis_bengkel','=','2')->get();

        $jenisperbaikanpengajuan = JenisPerbaikan::with('JenisBengkel')->where('status','=','Diajukan')->get();

        $jenisperbaikandiajukan = JenisPerbaikan::with('JenisBengkel')->where('status','=','Diajukan')->count();
        $jenisperbaikanaktifmobil = JenisPerbaikan::with('JenisBengkel')->where('status','=','Aktif')->where('id_jenis_bengkel','=','1')->count();
        $jenisperbaikanaktifmotor = JenisPerbaikan::with('JenisBengkel')->where('status','=','Aktif')->where('id_jenis_bengkel','=','2')->count();

        $id = JenisPerbaikan::getId();
        foreach($id as $value);
        $idlama = $value->id_jenis_perbaikan;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kodeperbaikan = 'JP-'.$blt.'/'.$idbaru;
        $jenis_bengkel = JenisBengkel::get();

        return view('admin-views.pages.jenisperbaikan.index',compact('jenis_bengkel','jenisperbaikanmobil','jenisperbaikanmotor','jenisperbaikandiajukan','jenisperbaikanaktifmobil','jenisperbaikanaktifmotor','jenisperbaikanpengajuan','kodeperbaikan'));
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
        $jenisperbaikan->id_jenis_bengkel = $request->id_jenis_bengkel;
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
        $jenisperbaikan->id_jenis_bengkel = $request->id_jenis_bengkel;
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
