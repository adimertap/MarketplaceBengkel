<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sparepart;
use Illuminate\Support\Str;

use App\Http\Requests\Admin\SparepartRequest;
use App\Model\MasterData\Kemasan;
use App\Model\MasterData\Konversi;
use App\Model\SingleSignOn\JenisBengkel;
use App\SparepartMerk;
use Laravel\Ui\Presets\React;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
         $sparepartmobil = Sparepart::with('Category', 'Merk', 'Bengkel')->where('id_jenis_bengkel','=','1')->get();
         $sparepartmotor = Sparepart::with('Category', 'Merk', 'Bengkel')->where('id_jenis_bengkel','=','2')->get();

         $id = Sparepart::getId();
            foreach ($id as $value);
            $idlama = $value->id_sparepart;
            $idbaru = $idlama + 1;
            $blt = date('m');

            $kode_sparepart = 'SP-' . $blt . '/' . $idbaru;
        
        
        $pengajuansparepart = Sparepart::where('status_sparepart','=','Diajukan')->get();
        $sparepartaktif = Sparepart::where('status_sparepart','=','Aktif')->where('id_jenis_bengkel','=','1')->count();
        $sparepartaktifmotor = Sparepart::where('status_sparepart','=','Aktif')->where('id_jenis_bengkel','=','2')->count();
        $sparepartpengajuan = Sparepart::where('status_sparepart','=','Diajukan')->count();
        
            
        $jenis_sparepart = Category::get();
        $merk_sparepart = SparepartMerk::get();
        $konversi = Konversi::get();
        $kemasan = Kemasan::get();
        $jenis_bengkel = JenisBengkel::get();
        
        
        return view('admin-views.pages.sparepart.index',compact('jenis_bengkel','sparepartmobil','sparepartmotor','kode_sparepart','jenis_sparepart','merk_sparepart','konversi','kemasan','pengajuansparepart','sparepartaktif','sparepartaktifmotor','sparepartpengajuan'));
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
    public function store(SparepartRequest $request)
    {
        $id = Sparepart::getId();
        foreach ($id as $value);
        $idlama = $value->id_sparepart;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_sparepart = 'SP-' . $blt . '/' . $idbaru;

        $sparepart = new Sparepart;
        $sparepart->id_jenis_sparepart = $request->id_jenis_sparepart;
        $sparepart->id_merk = $request->id_merk;
        $sparepart->id_konversi = $request->id_konversi;
        $sparepart->kode_sparepart = $kode_sparepart;
        $sparepart->nama_sparepart = $request->nama_sparepart;
        $sparepart->id_kemasan = $request->id_kemasan;
        $sparepart->dimensi_berat = $request->dimensi_berat;
        $sparepart->slug = Str::slug($request->nama_sparepart);
        $sparepart->lifetime = $request->lifetime;
        $sparepart->jenis_barang = $request->jenis_barang;
        $sparepart->status_sparepart = 'Aktif';
        $sparepart->id_jenis_bengkel = $request->id_jenis_bengkel;
        $sparepart->save();

        return redirect()->route('sparepart.index')->with('messageberhasil', 'Data Sparepart Berhasil ditambah');
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
    public function edit($id_sparepart)
    {
        $item = Sparepart::with('Category', 'Merk', 'Bengkel','Jenisbengkel')->findOrFail($id_sparepart);
        $jenis_sparepart = Category::get();
        $merk_sparepart = SparepartMerk::get();
        $konversi = Konversi::get();
        $kemasan = Kemasan::get();
        $jenis_bengkel = JenisBengkel::get();

        return view('admin-views.pages.sparepart.edit', [
            'item' => $item,
            'jenis_sparepart' => $jenis_sparepart,
            'merk_sparepart' => $merk_sparepart,
            'konversi' => $konversi,
            'kemasan' => $kemasan,
            'jenis_bengkel' => $jenis_bengkel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sparepart)
    {
        $sparepart = Sparepart::find($id_sparepart);
        $sparepart->id_jenis_sparepart = $request->id_jenis_sparepart;
        $sparepart->id_merk = $request->id_merk;
        $sparepart->id_konversi = $request->id_konversi;
        $sparepart->nama_sparepart = $request->nama_sparepart;
        $sparepart->id_kemasan = $request->id_kemasan;
        $sparepart->dimensi_berat = $request->dimensi_berat;
        $sparepart->lifetime = $request->lifetime;
        $sparepart->jenis_barang = $request->jenis_barang;
        $sparepart->id_jenis_bengkel = $request->id_jenis_bengkel;
        $sparepart->update();

        return redirect()->route('sparepart.index')->with('messageberhasil', 'Data Sparepart Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Sparepart::find($id);
        $item->delete();

         return redirect()->back()->with('messageberhasil','Data Sparepart Berhasil DiHapus');
   
    }


    public function getmerk($id)
    {
        $merk = SparepartMerk::where('id_jenis_sparepart', '=', $id)->pluck('merk_sparepart', 'id_merk');
        return json_encode($merk);
    }

    public function setStatus(Request $request, $id_sparepart)
    {

        $item = Sparepart::findOrFail($id_sparepart);
        $item->status_sparepart = $request->status_sparepart;
        
        $item->save();
        return redirect()->back()->with('messageberhasil', 'Data Pengajuan Sparepart Berhasil di Proses');
    }
}
