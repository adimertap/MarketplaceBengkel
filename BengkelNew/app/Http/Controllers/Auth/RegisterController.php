<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Provinsi;
use App\Kabupaten;
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
        $provinsi = Provinsi::all();
        return view('auth.register',
        [
            'provinsi' => $provinsi
        ]);
    }

    public function ajax ($id){
        $kabupaten = Kabupaten::where('id_provinsi', '=', $id)->pluck('nama_kabupaten', 'id_kabupaten');
        return json_encode($kabupaten);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'nama_user' => ['required', 'string', 'max:255'],
            'nohp_user' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tb_marketplace_user'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
            'id_kabupaten' => isset($data['id_kabupaten']) ? $data['id_kabupaten'] : NULL,            
        ]);
    }
}
