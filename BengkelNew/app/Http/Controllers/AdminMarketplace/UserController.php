<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;

use Illuminate\Support\Str;

use App\Http\Requests\Admin\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        //  $user = User::All();
         $users = DB::table('tb_marketplace_user')
            ->join('tb_kabupaten', 'tb_marketplace_user.id_kabupaten', '=', 'tb_kabupaten.id_kabupaten')
            ->join('tb_provinsi', 'tb_provinsi.id_provinsi', '=', 'tb_kabupaten.id_provinsi')
            ->get();
        //  dd($jenissparepart);
        // dd($users);
        return view('admin-views.pages.user.index',compact('users'));
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
    public function store(UserRequest $request)
    {
        $data = $request ->all();
        // dd($data);
        $data['password'] = bcrypt($request->password);

        User::create($data);
        return redirect()->route('user.index')
            ->with('messageberhasil','Data User Berhasil ditambahkan');
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
    public function update(UserRequest $request, $id_user)
    {   

        $data = $request ->all();
        
        $item = User::findOrFail($id_user);

        if($request->password){
            $data['password'] = bcrypt($request->password);
        }
        else{
            unset($data['password']);
        }
        $item -> update($data);
        return redirect()->route('user.index')
            ->with('messageberhasil','Data Jenis Sparepart Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user)
    {
        $item = User::findOrFail($id_user);
        $item->delete();

         return redirect()->route('user.index')
            ->with('messageberhasil','Data Jenis Sparepart Berhasil DiHapus');
   
    }
}
