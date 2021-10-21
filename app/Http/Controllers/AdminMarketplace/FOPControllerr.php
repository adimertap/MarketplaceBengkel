<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use App\Model\MasterData\FOP;
use Illuminate\Http\Request;

class FOPControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fop = FOP::get();
        $id = FOP::getId();
            foreach($id as $value);
            $idlama = $value->id_fop;
            $idbaru = $idlama + 1;
            $blt = date('m');

        $kode_fop = 'FOP'.'/'.$idbaru;

        return view('admin-views.pages.fop.index', compact('fop','kode_fop'));
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
        $fop = new FOP;
        $fop->nama_fop = $request->nama_fop;
        $fop->kode_fop = $request->kode_fop;

        $fop->save();
        return redirect()->back()->with('messageberhasil','Data Form of Payment Berhasil ditambahkan');
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
    public function update(Request $request, $id_fop)
    {
        $fop = FOP::findOrFail($id_fop);
        $fop->nama_fop = $request->nama_fop;
        
        $fop->update();
        return redirect()->back()->with('messageberhasil','Data Form of Payment Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_fop)
    {
        $fop = FOP::findOrFail($id_fop);
        $fop->delete();

        return redirect()->back()->with('messagehapus','Data Form of Payment Berhasil dihapus');
    }
}
