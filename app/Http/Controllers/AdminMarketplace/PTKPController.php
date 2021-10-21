<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PTKPRequest;
use App\Model\MasterData\PTKP;
use Illuminate\Http\Request;

class PTKPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ptkp = PTKP::get();

        return view('admin-views.pages.ptkp.index', compact('ptkp'));
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
    public function store(PTKPRequest $request)
    {
        $ptkp = new PTKP;
        $ptkp->nama_ptkp = $request->nama_ptkp;
        $ptkp->besaran_ptkp = $request->besaran_ptkp;
        $ptkp->keterangan_ptkp = $request->keterangan_ptkp;
        $ptkp->save();

        return redirect()->back()->with('messageberhasil','Data PTKP Berhasil ditambahkan');
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
    public function update(Request $request, $id_ptkp)
    {
        $ptkp = PTKP::find($id_ptkp);
        $ptkp->nama_ptkp = $request->nama_ptkp;
        $ptkp->besaran_ptkp = $request->besaran_ptkp;
        $ptkp->keterangan_ptkp = $request->keterangan_ptkp;
        $ptkp->update();

        return redirect()->back()->with('messageberhasil','Data PTKP Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ptkp)
    {
        $ptkp = PTKP::find($id_ptkp);
        $ptkp->delete();

        return redirect()->back()->with('messagehapus','Data PTKP Berhasil dihapus');
    }
}
