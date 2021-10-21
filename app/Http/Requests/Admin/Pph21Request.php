<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Pph21Request extends FormRequest
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
            'nama_pph21' => 'required|min:2|unique:tb_payroll_master_pph21,nama_pph21',
            'kumulatif_tahunan' => 'required',
            'besaran_pph21' => 'required|min:1'
        ];
    }

    public function messages()
    {
        return [
            'nama_pph21.required' => 'Error! Anda Belum Mengisi Nama Pajak Penghasilan',
            'nama_pph21.min' => 'Error! Character Minimal :min digit',
           
            'nama_pph21.unique' => 'Error! Pajak Penghasilan sudah Terdaftar',
            'kumulatif_tahunan.required' => 'Error! Anda Belum Mengisi Besaran Kumulatif Tahunan',

            'besaran_pph21.required' => 'Error! Anda Belum Mengisi Besaran Pajak Penghasilan',
            'besaran_pph21.min' => 'Error! Character Minimal :min digit',

        ];
    }
}
