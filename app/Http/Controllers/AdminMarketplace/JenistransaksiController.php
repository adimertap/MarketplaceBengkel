<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JenistransaksiRequest;
use App\Model\MasterData\Jenistransaksi;
use Illuminate\Http\Request;

class JenistransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenistransaksi = Jenistransaksi::get();

        return view('admin-views.pages.jenistransaksi.index',compact('jenistransaksi'));
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
    public function store(JenistransaksiRequest $request)
    {
        $jenistransaksi = new Jenistransaksi;
        $jenistransaksi->nama_transaksi = $request->nama_transaksi;

        $jenistransaksi->save();
        return redirect()->back()->with('messageberhasil','Data Jenis Transaksi Berhasil ditambah');
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
    public function update(Request $request, $id_jenis_transaksi)
    {
        $jenistransaksi = Jenistransaksi::find($id_jenis_transaksi);
        $jenistransaksi->nama_transaksi = $request->nama_transaksi;

        $jenistransaksi->update();
        return redirect()->back()->with('messageberhasil','Data Jenis Transaksi Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jenis_transaksi)
    {
        $jenistransaksi = Jenistransaksi::find($id_jenis_transaksi);
        $jenistransaksi->delete();

        return redirect()->back()->with('messagehapus','Data Jenis Transaksi Berhasil dihapus');
    }
}
