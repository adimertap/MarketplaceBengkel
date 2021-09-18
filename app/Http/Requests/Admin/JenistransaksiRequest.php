<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JenistransaksiRequest extends FormRequest
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
            'nama_transaksi' => 'required|min:3|max:25|unique:tb_accounting_master_jenis_transaksi,nama_transaksi',
        ];
    }

    public function messages()
    {
        return [
            'nama_transaksi.required' => 'Error! Anda Belum Mengisi Nama Transaksi',
            'nama_transaksi.min' => 'Error! Character Minimal :min digit',
            'nama_transaksi.max' => 'Error! Character Maximal :max digit',
            'nama_transaksi.unique' => 'Error! Nama Transaksi sudah Terdaftar'
        ];
    }
}
