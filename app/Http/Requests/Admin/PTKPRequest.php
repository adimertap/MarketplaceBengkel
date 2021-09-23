<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PTKPRequest extends FormRequest
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
            'nama_ptkp' => 'required|min:1|unique:tb_payroll_master_ptkp,nama_ptkp',
            'besaran_ptkp' => 'required|min:1',
            'keterangan_ptkp' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_ptkp.required' => 'Error! Anda Belum Mengisi Nama PTKP',
            'nama_ptkp.min' => 'Error! Character Minimal :min digit',
            'nama_ptkp.unique' => 'Error! PTKP sudah Terdaftar',
         
            'keterangan_ptkp.required' => 'Error! Anda Belum Mengisi Keterangan PTKP',

            'besaran_ptkp.required' => 'Error! Anda Belum Mengisi Besaran PTKP',
            'besaran_ptkp.min' => 'Error! Character Minimal :min digit',

        ];
    }
}
