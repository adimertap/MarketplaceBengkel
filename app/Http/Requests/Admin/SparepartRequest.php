<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SparepartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_jenis_sparepart' => 'required|exists:tb_inventory_master_jenis_sparepart,id_jenis_sparepart',
            'id_merk' => 'required|exists:tb_inventory_master_merk_sparepart,id_merk',
            'id_konversi' => 'required|exists:tb_inventory_master_konversi,id_konversi',
            'nama_sparepart' => 'required|min:5|max:50|unique:tb_inventory_master_sparepart,nama_sparepart',
            'id_kemasan' => 'required|exists:tb_inventory_master_kemasan,id_kemasan',
            'dimensi_berat' =>  'required|min:1|max:4',
            'lifetime' => 'required',
            'jenis_barang' => 'required',
            'id_jenis_bengkel' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'id_jenis_sparepart.required' => 'Error! Anda Belum Mengisi Jenis Sparepart',
            'id_merk.required' => 'Error! Anda Belum Mengisi Merk Sparepart',
            'id_konversi.required' => 'Error! Anda Belum Mengisi Satuan Konversi Sparepart',
            'id_kemasan.required' =>'Error! Anda Belum Mengisi Kemasan Sparepart',
            'id_jenis_bengkel.required' =>'Error! Anda Belum Mengisi Kegunaan Sparepart',
            'lifetime' => 'Error! Anda Belum Mengisi Masa Berlaku Sparepart',
            'jenis_barang' => 'Error! Anda Belum Mengisi Jenis Barang Sparepart',
           
            'nama_sparepart.required' => 'Error! Anda Belum Mengisi Nama Sparepart',
            'nama_sparepart.min' => 'Error! Character Minimal :min digit',
            'nama_sparepart.max' => 'Error! Character Maximal :max digit',
            'nama_sparepart.unique' => 'Error! Sparepart sudah Terdaftar',

            'lifetime.reqired' => 'Error! Anda Belum Mengisi Masa Berlaku Sparepart',
            'dimensi_berat.required' => 'Error! Anda Belum Mengisi Berat Sparepart',
            'dimensi_berat.min' => 'Error! Nominal Minimal :min digit',
            'dimensi_berat.max' => 'Error! Nominal Maximal :max digit',


        ];
    }
}
