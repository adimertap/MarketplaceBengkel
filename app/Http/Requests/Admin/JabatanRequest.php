<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JabatanRequest extends FormRequest
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
            'nama_jabatan' => 'required|min:3|max:25|unique:tb_kepeg_master_jabatan,nama_jabatan',
        ];
    }

    public function messages()
    {
        return [
            'nama_jabatan.required' => 'Error! Anda Belum Mengisi Nama Jabatan',
            'nama_jabatan.min' => 'Error! Character Minimal :min digit',
            'nama_jabatan.max' => 'Error! Character Maximal :max digit',
            'nama_jabatan.unique' => 'Error! Nama Jabatan sudah Terdaftar'
        ];
    }
}
