<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JabatanRequest;
use App\Model\MasterData\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::get();

        return view('admin-views.pages.jabatan.index',compact('jabatan'));
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
    public function store(JabatanRequest $request)
    {
        $jabatan = new Jabatan;
        $jabatan->nama_jabatan = $request->nama_jabatan;

        $jabatan->save();
        return redirect()->back()->with('messageberhasil','Data Jabatan Berhasil ditambah');
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
    public function update(Request $request, $id_jabatan)
    {
        $jabatan = Jabatan::find($id_jabatan);
        $jabatan->nama_jabatan = $request->nama_jabatan;

        $jabatan->update();
        return redirect()->back()->with('messageberhasil','Data Jabatan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jabatan)
    {
        $jabatan = Jabatan::find($id_jabatan);
        $jabatan->delete();
        return redirect()->back()->with('messagehapus','Data Jabatan Berhasil dihapus');
    }
}
