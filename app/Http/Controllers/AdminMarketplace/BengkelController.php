<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bengkel;
use Illuminate\Support\Str;

use App\Http\Requests\Admin\BengkelRequest;

class BengkelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $bengkel = Bengkel::All();
        //  dd($bengkel);
        return view('admin-views.pages.bengkel.index',compact('bengkel'));
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
    public function store(BengkelRequest $request)
    {
        $data = $request ->all();

        Bengkel::create($data);
        return redirect()->route('bengkel.index')
            ->with('messageberhasil','Data Jenis Bengkel Berhasil ditambahkan');
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
    public function update(BengkelRequest $request, $id_jenis_bengkel)
    {
        $data = $request ->all();

        $item = Bengkel::findOrFail($id_jenis_bengkel);
        $item -> update($data);
        return redirect()->route('bengkel.index')
            ->with('messageberhasil','Data Jenis Bengkel Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Bengkel::findOrFail($id);
        $item->delete();

         return redirect()->route('bengkel.index')
            ->with('messageberhasil','Data Jenis Bengkel Berhasil DiHapus');
   
    }
}
