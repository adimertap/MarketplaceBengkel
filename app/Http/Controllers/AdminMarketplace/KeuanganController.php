<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;

use App\Http\Requests\Admin\CategoryRequest;
use App\Keuangan;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $penarikan = Keuangan::with('Bengkel')->orderBy('id_keuangan', 'DESC')->get();
        return view('admin-views.pages.keuangan.index',compact('penarikan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  

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
    public function update(Request $request, $id)
    {
        $data = $request ->all();
        $item = Keuangan::findOrFail($id);
        $item -> update($data);
        return redirect()->route('keuangan.index')
            ->with('messageberhasil','penarikan saldo berhasil diubah');
    }

    
}
