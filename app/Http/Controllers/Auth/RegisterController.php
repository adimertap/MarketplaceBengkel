<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\KabupatenBaru;
use App\KecamatanBaru;
use App\DesaBaru;
use App\ProvinsiBaru;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $provinsi = ProvinsiBaru::all();
        return view('auth.register',
        [
            'provinsi' => $provinsi
        ]);
    }

    public function kabupaten_baru($id)
    {
        $kabupaten = KabupatenBaru::where('id_provinsi', '=', $id)->pluck('name', 'id_kabupaten');
        return json_encode($kabupaten);
    }

    public function kecamatan_baru($id)
    {
        $kecamatan = KecamatanBaru::where('id_kabupaten', '=', $id)->pluck('name', 'id_kecamatan');
        return json_encode($kecamatan);
    }

    public function desa_baru($id)
    {
        $desa = DesaBaru::where('id_kecamatan', '=', $id)->pluck('name', 'id_desa');
        return json_encode($desa);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'nama_user' => ['required', 'string', 'max:255'],
            'nohp_user' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tb_marketplace_user'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'alamat_user' => ['required', 'string', 'max:20'],
            'kabupaten' => ['required', 'string', 'max:20'],
            'desa' => ['required', 'string', 'max:20'],            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nama_user' => $data['nama_user'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nohp_user' => $data['nohp_user'],
            'alamat_user' => isset($data['alamat_user']) ? $data['alamat_user'] : "",
            'id_kabupaten' => isset($data['kabupaten']) ? $data['kabupaten'] : NULL,  
            'id_desa' => isset($data['desa']) ? $data['desa'] : NULL,            
          
        ]);
    }
}
