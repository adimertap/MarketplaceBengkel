<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sparepart;
use Illuminate\Support\Str;

use App\Http\Requests\Admin\SparepartRequest;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
         $sparepart = Sparepart::with('Category','Galleries', 'Merk', 'Bengkel')->get();
        //  dd($sparepart);
        return view('admin-views.pages.sparepart.index',compact('sparepart'));
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
        $data = $request ->all();

        Sparepart::create($data);
        return redirect()->route('sparepart.index')
            ->with('messageberhasil','Data Jenis Sparepart Berhasil ditambahkan');
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
    public function update(SparepartRequest $request, $id_jenis_sparepart)
    {
        $data = $request ->all();

        $item = Sparepart::findOrFail($id_jenis_sparepart);
        $item -> update($data);
        return redirect()->route('sparepart.index')
            ->with('messageberhasil','Data Jenis Sparepart Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Sparepart::findOrFail($id);
        $item->delete();

         return redirect()->route('sparepart.index')
            ->with('messageberhasil','Data Jenis Sparepart Berhasil DiHapus');
   
    }
}
